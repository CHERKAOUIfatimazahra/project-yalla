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
    public function social()
    {
        $user = User::all();
        $categories = Category::all();
        $publishedEvents = Event::where('is_published', 1)
                            ->whereHas('categories', function ($query) {
                                $query->where('name', 'Social');
                            })
                            ->latest()
                            ->paginate(6);

        if ($publishedEvents->isEmpty()) {
            $publishedEvents = collect(); 
        }

        return view('page-categories.social', compact('publishedEvents', 'user', 'categories'));
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
    public function educational()
    {
        $user = User::all();
        $categories = Category::all();
        $publishedEvents = Event::where('is_published', 1)
                                ->whereHas('categories', function ($query) {
                                    $query->where('name', 'educational');
                                })
                                ->latest()
                                ->paginate(6);

        if ($publishedEvents->isEmpty()) {
            $publishedEvents = collect(); // Empty collection
        }

        return view('page-categories.educational', compact('publishedEvents', 'user', 'categories'))
                ->with('i', (request()->input('page', 1) - 1) * 6);
    }
    public function sporting()
    {
        $user = User::all();
        $categories = Category::all();
        $publishedEvents = Event::where('is_published', 1)
                                ->whereHas('categories', function ($query) {
                                    $query->where('name', 'sporting');
                                })
                                ->latest()
                                ->paginate(6);

        if ($publishedEvents->isEmpty()) {
            $publishedEvents = collect(); // Empty collection
        }

        return view('page-categories.sporting', compact('publishedEvents', 'user', 'categories'))
                ->with('i', (request()->input('page', 1) - 1) * 6);
    }
    
    public function entertainment()
    {
        $user = User::all();
        $categories = Category::all();
        $publishedEvents = Event::where('is_published', 1)
                            ->whereHas('categories', function ($query) {
                                $query->where('name', 'entertainment');
                            })
                            ->latest()
                            ->paginate(6);

        if ($publishedEvents->isEmpty()) {
            $publishedEvents = collect(); // Empty collection
        }

        return view('page-categories.entertainment', compact('publishedEvents', 'user', 'categories'))
                ->with('i', (request()->input('page', 1) - 1) * 6);
    }
    public function anime()
    {
        $user = User::all();
        $categories = Category::all();
        $publishedEvents = Event::where('is_published', 1)
                            ->whereHas('categories', function ($query) {
                                $query->where('name', 'anime');
                            })
                            ->latest()
                            ->paginate(6);

        if ($publishedEvents->isEmpty()) {
            $publishedEvents = collect(); // Empty collection
        }

        return view('page-categories.anime', compact('publishedEvents', 'user', 'categories'))
                ->with('i', (request()->input('page', 1) - 1) * 6);
    }

    
    public function eventShow(Event $event)
    {
        return view('single_page', compact('event')); 
    }
    
}



// class PageCategoryController extends Controller
// {
//     private $user;
//     private $categories;

//     public function __construct(User $user, Category $category)
//     {
//         $this->user = $user->all();
//         $this->categories = $category->all();
//     }

//     private function getPublishedEventsByCategory($categoryName)
//     {
//         return Event::where('is_published', 1)
//             ->whereHas('categories', function ($query) use ($categoryName) {
//                 $query->where('name', $categoryName);
//             })
//             ->latest()
//             ->paginate(6);
//     }

//     public function business()
//     {
//         $publishedEvents = $this->getPublishedEventsByCategory('Business');
//         return view('page-categories.business', compact('publishedEvents', 'user', 'categories'));
//     }

//     // Other category methods follow the same structure...

//     public function eventShow(Event $event)
//     {
//         return view('single_page', compact('event'));
//     }
// }