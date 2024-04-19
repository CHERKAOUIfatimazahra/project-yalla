<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventRequest;
use App\Http\Requests\UpdateEventRequest;
use App\Models\Category;
use App\Models\Event;
use App\Repositories\EventRepositoryInterface;
use Illuminate\Http\Request;

class EventController extends Controller
{
    protected $eventRepository;

    public function __construct(EventRepositoryInterface $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }

    public function index()
    {
        $user = auth()->user();

        if ($user->hasRole('admin')) {
            $events = $this->eventRepository->all();
        } else {
            $events = $this->eventRepository->findByUserId($user->id);
        }

        return view('dashbord.events.index', compact('events'))
            ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function create()
    {
        $categories = Category::all();
        return view('dashbord.events.create', compact('categories'));
    }

    public function store(StoreEventRequest $request)
    {
        $data = $request->validated();
        $imageFileName = null;
        
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageFileName = time() . '.' . $file->getClientOriginalExtension();
            $path = 'uploads/events/';
            $file->move($path, $imageFileName);
        }

        $data['image'] = $imageFileName;
        $data['user_id'] = auth()->id();
         

        $event = $this->eventRepository->create($data);
        return redirect()->route('events.index')->with('success', 'Event created successfully.');
    }

    public function show(Event $event)
    {
        return view('dashbord.events.show', compact('event'));
    }

    public function edit(Event $event)
    {
        $categories = Category::all();
        return view('dashbord.events.edit', compact('event', 'categories'));
    }

    public function update(UpdateEventRequest $request, Event $event)
    {
        $data = $request->validated();

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $fileName = time() . '.' . $extension;
            $path = 'uploads/events/';
            $file->move($path, $fileName);
            $data['image'] = $fileName;
        }

        $data['user_id'] = auth()->id();

        $this->eventRepository->update($event, $data);

        return redirect()->route('events.index')->with('success', 'Event updated successfully');
    }

    public function destroy(Event $event)
    {
        $this->eventRepository->delete($event);

        return redirect()->route('events.index')->with('success', 'Event deleted successfully');
    }

    public function publicEvent(Request $request, Event $event)
    {
        $event->is_published = $request->input("is_published");
        $event->save();
        return redirect()->route('events.index');
    }
}
