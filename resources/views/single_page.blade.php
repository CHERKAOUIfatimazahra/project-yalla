@extends('layout.app')

@section('content')
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
        <x-alert />
        <div class="bg-cover bg-center text-center overflow-hidden"
            style="min-height: 500px; background-image: url({{ asset('uploads/events/' . $event->image) }})"
            title="Event Image">
        </div>
        <div class="max-w-3xl mx-auto">
            <div class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                <div class="bg-white relative top-0 -mt-32 p-5 sm:p-10">
                    <h1 href="#" class="text-gray-900 font-bold text-3xl mb-2">{{ $event->title }}</h1>
                    
                    <h2 class="text-2xl font-bold my-5">{{ $event->description }}</h2>

                    <h3 class="text-2xl font-bold my-5">location : {{ $event->location }}</h3>
                    <p>Event start at :{{ \Carbon\Carbon::parse($event->start_datetime)->format('Y-F-d') }}</p>
                    <p>Event end at :{{ \Carbon\Carbon::parse($event->end_datetime)->format('Y-F-d') }}</p>
                    <p>{{ $event->type }}</p>
                    <h3>{{ $event->price }}£</h3>
                    <p>{{ $event->tickets_available }} place</p>

                </div>
                <form action="{{ route('events.reserve', ['eventId' => $event->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="select-none rounded-lg bg-pink-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                        Reserve now</button>
                </form>
            </div>
        </div>
    </div>
@endsection
