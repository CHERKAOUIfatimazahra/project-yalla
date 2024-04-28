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

    public function updateStatus(Request $request, $reservationId)
    {
        $request->validate([
            'new_status' => 'required|in:approved,rejected',
        ]);

        $newStatus = $request->input('new_status');

        $this->reservationRepository->updateStatus($reservationId, $newStatus);

        return redirect()->back()->with('success', 'Reservation status updated successfully.');
    }
}
