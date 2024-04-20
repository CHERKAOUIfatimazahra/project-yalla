@extends('layout.add')

@section('content')
    <div class="p-4 sm:ml-64">
        <section class="bg-white p-3 sm:p-5">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <!-- Search Form (if needed) -->
                        </div>
                        <x-alert />
                    </div>
                    <div class="overflow-x-auto">

                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Event Title</th>
                                    <th scope="col" class="px-4 py-3">Place</th>
                                    <th scope="col" class="px-4 py-3">Reservation Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($reservations->isEmpty())
                                    <p>No resrvation.</p>
                                @else
                                    @foreach ($reservations as $reservation)
                                        <tr class="border-b">
                                            <td class="px-4 py-3">{{ $reservation->event->title }}</td>
                                            <td class="px-4 py-3">{{ $reservation->place }}</td>
                                            <td class="px-4 py-3">
                                                {{ $reservation->status }}

                                                @if ($reservation->status_reservation === 'pending')
                                                    <div class="mt-4 text-green-500">your reservation is pending.</div>
                                                @elseif ($reservation->status_reservation === 'approved' && $reservation->payment_status === 'paid')
                                                    <form
                                                        action="{{ route('download.pdf', ['userId' => auth()->user()->id, 'reservationId' => $reservation->id]) }}"
                                                        method="POST">
                                                        @csrf
                                                        <button type="submit"
                                                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                            Télécharger
                                                        </button>
                                                    </form>
                                            <td>
                                                <form
                                                    action="{{ route('generate.pdf', ['userId' => auth()->user()->id, 'reservationId' => $reservation->id]) }}"
                                                    method="POST">
                                                    @csrf
                                                    <button type="submit" class="text-primary-600 hover:text-primary-900">
                                                        Envoyer par email
                                                    </button>
                                                </form>
                                            </td>
                                            </td>

                                            <td class="px-4 py-3">
                                                <a href="{{ route('user.reservation.details', ['userId' => auth()->user()->id, 'reservationId' => $reservation->id]) }}"
                                                    class="text-primary-600 hover:text-primary-900">View Reservation
                                                    Details</a>
                                            </td>
                                        @elseif($reservation->status_reservation === 'approved' && $reservation->payment_status === 'unpaid')
                                            <form
                                                action="{{ route('payment.process', ['reservationId' => $reservation->id]) }}"
                                                method="POST">
                                                @csrf
                                                <button type="submit"
                                                    class="bg-yellow-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Checkout
                                                </button>
                                            </form>
                                        @elseif($reservation->status_reservation === 'rejected')
                                            <div class="mt-4 text-red-500">your reservation is rejected.</div>
                                    @endif
                                    </td>
                                    </tr>
                                @endforeach
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4 bg-white"
                        aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500">
                            {{ $reservations->firstItem() }}-{{ $reservations->lastItem() }} of
                            {{ $reservations->total() }}
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            {{ $reservations->links('pagination.custom-pagination') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </div>
@endsection
