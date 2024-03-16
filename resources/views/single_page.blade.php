@extends('layout.app')

@section('content')
    <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16 relative">
        @if ($message = Session::get('success'))
                <div
                    class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative w-full sm:w-1/2 lg:w-1/3">
                    <strong class="font-bold">Success!</strong>
                    <p>{{ $message }}</p>
                </div>
            @endif
            @if ($message = Session::get('error'))
                <div
                    class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative w-full sm:w-1/2 lg:w-1/3">
                    <strong class="font-bold">Error!</strong>
                    <p>{{ $message }}</p>
                </div>
            @endif
        <div class="bg-cover bg-center text-center overflow-hidden"
            style="min-height: 500px; background-image: url({{ asset('uploads/events/' . $event->image) }})"
            title="Event Image">
        </div>
        <div class="max-w-3xl mx-auto">
            <div class="mt-3 bg-white rounded-b lg:rounded-b-none lg:rounded-r flex flex-col justify-between leading-normal">
                <div class="bg-white relative top-0 -mt-32 p-5 sm:p-10">
                    <h1 href="#" class="text-gray-900 font-bold text-3xl mb-2">{{ $event->title }}</h1>
                    
                    <h2 class="text-base leading-8 my-5">{{ $event->description }}</h2>

                    <h3 class="text-2xl font-bold my-5">{{ $event->location }}</h3>
                    <p>{{ $event->start_datetime }}</p>
                    <p>{{ $event->end_datetime }}</p>
                    <p>{{ $event->type }}</p>
                    <h3>{{ $event->price }} DH</h3>
                    <p>{{ $event->tickets_available }} place</p>

                </div>
                <form action="{{ route('events.reserve', ['eventId' => $event->id]) }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                        Reserve Now
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
