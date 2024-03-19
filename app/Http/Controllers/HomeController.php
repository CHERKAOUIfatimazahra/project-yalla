<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = User::all();
        $categories = Category::all();
        $publishedEvents = Event::where('is_published', 1)->latest()->paginate(6);

        return view('home', compact('publishedEvents','user','categories'));
    }
    public function eventShow(Event $event)
    {
        return view('single_page', compact('event')); 
    }
    public function findEvent()
    {
        $categories = Category::get();
        $publishedEvents = Event::where('is_published', 1)->latest()->paginate(8);

        return view('find-event', compact('publishedEvents','categories'));
    }

}
