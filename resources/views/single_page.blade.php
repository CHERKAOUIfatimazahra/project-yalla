@extends('layout.app')

@section('content')
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
        <x-alert />
        <div class="bg-cover bg-center text-center overflow-hidden"
            style="min-height: 500px; background-image: url({{ $event->image ? asset('/uploads/events/' . $event->image) : '../images/yalla.png' }})"
            title="Event Image">
        </div>
        <div class="max-w-3xl mx-auto">
            <div class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                <div class="bg-white relative top-0 -mt-32 p-5 sm:p-10">
                    <h1 class="text-gray-900 font-bold text-3xl mb-2">{{ $event->title }}</h1>

                    <h2 class="text-xl font-semibold my-5">{{ $event->description }}</h2>

                    <h3 class="text-lg my-5">Location: {{ $event->location }}</h3>
                    <p class="text-lg font-semibold my-5">
                        Event start: {{ \Carbon\Carbon::parse($event->start_datetime)->format('Y F d') }} 
                        at: {{ \Carbon\Carbon::parse($event->start_datetime)->format('H:i') }}
                    </p>
                    <p class="text-lg font-semibold my-5">
                        Event end: {{ \Carbon\Carbon::parse($event->end_datetime)->format('Y F d') }}
                        at: {{ \Carbon\Carbon::parse($event->end_datetime)->format('H:i') }}
                    </p>
                    <p class="text-lg my-5">Type: {{ $event->type }}</p>
                    <h3 class="text-lg font-semibold my-5">{{ $event->price }} $</h3>
                    <p class="text-lg font-semibold my-5">{{ $event->tickets_available }} places</p>
                    <div class="flex items-center mt-5">
                        <a href="{{ route('organizer.page', ['userId' => $event->user->id]) }}" class="flex items-center">
                            <img src="{{ asset("/images/{$event->user->image}") }}" class="h-10 w-10 rounded-full mr-2" alt="User Avatar">
                            <span class="text-gray-700">{{ $event->user->name }}</span>
                        </a>
                    </div>
                </div>
        
                @php
                    $dateTime = new DateTime($event->end_datetime);
                    // Get the current date and time
                    $currentDateTime = new DateTime();
                @endphp

                @if ($dateTime > $currentDateTime)
                    <form method="post" class="flex gap-1"
                        action="{{ route('events.reserve', ['eventId' => $event->id]) }}">
                        @csrf
                        <button
                            class="select-none rounded-lg bg-pink-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                            Book
                        </button>
                    </form>
                @else
                    <button
                        class="select-none rounded-lg bg-black py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-white-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Reservation Ended
                    </button>
                @endif
            </div>
        </div>
    </div>
@endsection
