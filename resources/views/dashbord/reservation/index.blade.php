@extends('layout.add')

@section('content')
    <div class="p-4 sm:ml-64">
        <section class="bg-white p-3 sm:p-5">
            <x-alert />
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                    
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">
                        <div class="w-full md:w-1/2">
                            <!-- Search Form (if needed) -->
                        </div>
                        
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Event Title</th>
                                    <th scope="col" class="px-4 py-3">User</th>
                                    <th scope="col" class="px-4 py-3">Place</th>
                                    <th scope="col" class="px-4 py-3">Reservation Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($reservations->isEmpty())
                                    <p class="px-4 py-3">No resrvation.</p>
                                @else
                                    @foreach ($reservations as $reservation)
                                    @if($reservation->status_reservation !== "rejected")
                                        <tr class="border-b">
                                            <td class="px-4 py-3">{{ $reservation->event->title }}</td>
                                            <td class="px-4 py-3">{{ $reservation->user->name }}</td>
                                            <td class="px-4 py-3">{{ $reservation->place }}</td>
                                            @if($reservation->status_reservation == "pending")
                                            <td class="px-4 py-3">
                                                <form method="POST" action="{{ route('reservations.updateStatus', $reservation->id) }}">
                                                    @csrf
                                                    @method('PUT')
                                                    <div class="flex">
                                                        <input type="hidden" name="status_reservation" value="{{ $reservation->status_reservation }}">
                                                        <button type="submit" name="status" value="approved" class="mr-2 bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">Approved</button>
                                                        <button type="submit" name="status" value="rejected" class="bg-red-100 hover:bg-red-200 px-4 py-2 rounded-md">Rejected</button>
                                                    </div>
                                                </form>
                                            </td>
                                            @endif
                                            <td class="px-4 py-3">
                                                @if($reservation->payment_status == "unpaid")
                                                <td class="px-4 py-3">
                                                    
                                                </td>
                                                @endif 
                                            </td>
                                        </tr>
                                    @endif
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
                            {{ $reservations->links() }}
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </div>
@endsection
