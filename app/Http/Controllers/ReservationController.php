<?php

namespace App\Http\Controllers;

use App\Repositories\ReservationRepositoryInterface;
use Illuminate\Http\Request;

class ReservationController extends Controller
{
    protected $reservationRepository;

    public function __construct(ReservationRepositoryInterface $reservationRepository)
    {
        $this->reservationRepository = $reservationRepository;
    }

    public function index($eventId)
    {
        $reservations = $this->reservationRepository->index($eventId);
        return view('dashbord.reservation.index', compact('reservations'))
                    ->with('i', (request()->input('page', 1) - 1) * 10);
    }

    public function reservation(Request $request, $eventId)
    {
        return $this->reservationRepository->makeReservation($request, $eventId);
    }

    public function updateStatus(Request $request, $id)
    {
        return $this->reservationRepository->updateStatus($request, $id);
    }
}
