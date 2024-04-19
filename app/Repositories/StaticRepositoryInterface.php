<?php

namespace App\Repositories;

interface StaticRepositoryInterface
{
    public function getTotalCounts();

    public function getReservationStatistics($organizer);
}
