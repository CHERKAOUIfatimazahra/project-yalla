<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Event::query();

        if ($request->start_date && $request->end_date) {
            $query->whereBetween('start_datetime', [$request->start_date, $request->end_date]);
        }
        
        if ($request->category) {
            $query->where('category_id', $request->category);
        }
        
        if ($request->search_string) {
            $req = $request->search_string;
            $query->where('title', 'like', '%' . $request->search_string . '%')->orWhereHas('user', function($query) use ($req) {
                $query->where('name', 'like', '%' . $req . '%');
            });
        }
        
        $events = $query->where('is_published', true)
                        ->orderBy('start_datetime', 'desc')
                        ->get();

        $events->load("categories");

        return response()->json([
            'events' => $events,
            'status' => $events->isNotEmpty(),
        ]);
    }
}