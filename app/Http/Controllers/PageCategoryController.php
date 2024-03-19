<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class PageCategoryController extends Controller
{
    public function business()
    {
        $user = User::all();
        $categories = Category::all();
        $publishedEvents = Event::where('is_published', 1)
                            ->whereHas('categories', function ($query) {
                                $query->where('name', 'Business');
                            })
                            ->latest()
                            ->paginate(6);

        if ($publishedEvents->isEmpty()) {
            $publishedEvents = collect(); // Empty collection
        }

        return view('page-categories.business', compact('publishedEvents', 'user', 'categories'));
    }

    public function entertainment()
    {
        $user = User::all();
        $categories = Category::all();
        $publishedEvents = Event::where('is_published', 1)
                            ->whereHas('categories', function ($query) {
                                $query->where('name', 'Entertainment');
                            })
                            ->latest()
                            ->paginate(6);

        if ($publishedEvents->isEmpty()) {
            $publishedEvents = collect(); // Empty collection
        }

        return view('page-categories.entertainment', compact('publishedEvents', 'user', 'categories'))
                ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    public function cultural()
    {
        $user = User::all();
        $categories = Category::all();
        $publishedEvents = Event::where('is_published', 1)
                                ->whereHas('categories', function ($query) {
                                    $query->where('name', 'Cultural');
                                })
                                ->latest()
                                ->paginate(6);

        if ($publishedEvents->isEmpty()) {
            $publishedEvents = collect(); // Empty collection
        }

        return view('page-categories.cultural', compact('publishedEvents', 'user', 'categories'))
                ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    public function eventShow(Event $event)
    {
        return view('single_page', compact('event')); 
    }
    
}
