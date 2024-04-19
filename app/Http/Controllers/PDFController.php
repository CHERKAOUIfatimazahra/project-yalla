<?php

namespace App\Http\Controllers;

use App\Repositories\PDFRepositoryInterface;

class PDFController extends Controller
{
    protected $pdfRepository;

    public function __construct(PDFRepositoryInterface $pdfRepository)
    {
        $this->pdfRepository = $pdfRepository;
    }

    public function index($userId, $reservationId)
    {
        $user = $this->pdfRepository->getUserById($userId);
        $reservation = $this->pdfRepository->getReservationById($reservationId);

        $data = [
            "email" => "cherkaoui.fatimazahra97@gmail.com",
            // 'email' => $user->email,
            'title' => 'Ticket for your reservation',
            'body' => 'This is Demo',
        ];

        $pdfData = ['reservation' => $reservation, 'data' => $data];

        $this->pdfRepository->sendReservationPDF($data['email'], $data['title'], $data['body'], $pdfData);

        return redirect()->back()->with('success', 'Mail sent successfully');
    }

    public function download($userId, $reservationId)
    {
        $reservation = $this->pdfRepository->getReservationById($reservationId);

        $data = [
            'title' => 'Ticket for your reservation',
            'body' => 'This is Demo',
        ];

        $pdfData = ['reservation' => $reservation, 'data' => $data];

        return $this->pdfRepository->downloadReservationPDF($data['title'], $data['body'], $pdfData);
    }
}
