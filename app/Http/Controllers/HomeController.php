<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
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
        // $eventOfWeek = ;
        return view('home', compact('publishedEvents','user','categories','popularEvents'));
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
