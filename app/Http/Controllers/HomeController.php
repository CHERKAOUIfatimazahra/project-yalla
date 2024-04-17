<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $categories = Category::all();
        $publishedEvents = Event::where('is_published', 1)->latest()->paginate(6);
        $popularEvents = Event::join('reservations', 'events.id', '=', 'reservations.event_id')
                                ->where('events.is_published', 1)   
                                ->select('events.*', DB::raw('COUNT(reservations.id) as reservations_count'))
                                ->groupBy('events.id')
                                ->orderByDesc('reservations_count')
                                ->limit(10)
                                ->get();
         
        // Get the start and end dates of the current week
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        // Fetch events for the current week
        $eventsOfWeek = Event::where('is_published', 1)
                             ->whereBetween('start_datetime', [$startOfWeek, $endOfWeek])
                             ->limit(10)
                             ->get();
        //   dd($eventsOfWeek);                   
        return view('home', compact('publishedEvents','user','categories','popularEvents','eventsOfWeek'));
    }
    public function eventShow(Event $event)
    {
        return view('single_page', compact('event')); 
    }
    public function findEvent()
    {
        $categories = Category::get();
        $publishedEvents = Event::where('is_published', 1)->latest()->paginate(9);

        return view('find-event', compact('publishedEvents','categories'));
    }
    
}
