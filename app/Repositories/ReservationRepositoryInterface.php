<?php

namespace App\Repositories;

use Illuminate\Http\Request;

interface ReservationRepositoryInterface
{
    public function index($eventId);

    public function makeReservation($userId, $eventId);

    public function updateStatus($reservationId, $status); 
}
