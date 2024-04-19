<?php

namespace App\Repositories;

interface PDFRepositoryInterface
{
    public function getUserById($userId);

    public function getReservationById($reservationId);

    public function sendReservationPDF($email, $title, $body, $pdfData);

    public function downloadReservationPDF($title, $body, $pdfData);
}
