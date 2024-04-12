<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Event;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        $query = Event::query();

       
        if ($request->has('category')) {
            $query->where('category_id', $request->category);
        }

        if ($request->has('search_string')) {
            $query->where('title', 'like', '%' . $request->search_string . '%');
        }

        if ($request->has('start_date') && $request->has('end_date')) {
            $query->whereBetween('start_datetime', [$request->start_date, $request->end_date]);
        }
        
        $events = $query->where('is_published', true)
                        ->orderBy('start_datetime', 'desc')
                        ->paginate(6);

        return response()->json([
            'events' => $events,
            'status' => $events->isNotEmpty(),
        ]);
    }
    
}
