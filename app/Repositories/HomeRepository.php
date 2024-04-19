<?php

namespace App\Repositories;

use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeRepository implements HomeRepositoryInterface
{
    public function getUsers()
    {
        return User::all();
    }

    public function getCategories()
    {
        return Category::all();
    }

    public function getPublishedEvents()
    {
        return Event::where('is_published', 1)->latest()->paginate(6);
    }

    public function getPopularEvents()
    {
        return Event::join('reservations', 'events.id', '=', 'reservations.event_id')
            ->where('events.is_published', 1)
            ->select('events.*', DB::raw('COUNT(reservations.id) as reservations_count'))
            ->groupBy('events.id')
            ->orderByDesc('reservations_count')
            ->limit(10)
            ->get();
    }

    public function getEventsOfWeek()
    {
        $startOfWeek = Carbon::now()->startOfWeek();
        $endOfWeek = Carbon::now()->endOfWeek();

        return Event::where('is_published', 1)
            ->whereBetween('start_datetime', [$startOfWeek, $endOfWeek])
            ->limit(10)
            ->get();
    }
}
