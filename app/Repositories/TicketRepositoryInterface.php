<?php

namespace App\Repositories;

interface TicketRepositoryInterface
{
    public function getUserReservations($userId);

    public function getReservationById($reservationId);
}
