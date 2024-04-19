<?php

namespace App\Repositories;

use App\Models\Reservation;

class TicketRepository implements TicketRepositoryInterface
{
    public function getUserReservations($userId)
    {
        return Reservation::where('user_id', $userId)
                          ->latest()
                          ->paginate(10);
    }

    public function getReservationById($reservationId)
    {
        return Reservation::findOrFail($reservationId);
    }
}
