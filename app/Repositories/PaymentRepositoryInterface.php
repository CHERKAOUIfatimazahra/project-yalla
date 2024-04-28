<?php

namespace App\Repositories;

interface PaymentRepositoryInterface
{
    public function createPayment($reservationId, $totalAmount);

    public function getPayment($paymentId);

    public function updateReservationPaymentStatus($reservationId); 
}
