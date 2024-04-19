<?php

namespace App\Repositories;

use App\Models\Category;
use App\Models\Event;
use App\Models\Reservation;
use App\Models\Role;
use App\Models\User;

class StaticRepository implements StaticRepositoryInterface
{
    public function getTotalCounts()
    {
        $users_count = User::count();
        $events_count = Event::count();
        $categories_count = Category::count();
        $roles_count = Role::count();
        $reservation_count = Reservation::count();
        
        return compact('users_count', 'events_count', 'categories_count', 'roles_count', 'reservation_count');
    }

    public function getReservationStatistics($organizer)
    {
        $total_events = $organizer->events()->count();

        $total_user_reservations = 0;

        foreach ($organizer->events as $event) {
            $total_user_reservations += $event->reserve()->count();
        }

        return compact('total_events', 'total_user_reservations');
    }
}
