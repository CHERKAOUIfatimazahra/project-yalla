@extends('layout.app')
@section('content')
    <section class="relative h-screen flex flex-col items-center justify-center text-center text-white">
        <div class="video-docker absolute top-0 left-0 w-full h-full overflow-hidden">
            <video class="min-w-full min-h-full absolute object-cover" src="{{ asset('images/concert-loop.mp4') }}"
                type="video/mp4" autoplay muted loop></video>
            <!-- Your images go here -->
            <img src="{{ asset('images/we-can-dance-forever2.png') }}"
                class="absolute top-0 left-0 w-full object-cover opacity-80" alt="Image 1">
        </div>
    </section>

    <section class="relative flex flex-col justify-center items-center">

        <div class="flex justify-center">
            <x-alert />
        </div>
        <img src="{{ asset('images/we-can-dance-forever2.png') }}" class="top-0 left-0 w-full object-cover opacity-80"
            alt="Image 1">
        <div class="p-10 absolute">
            <h1 class="text-center text-3xl font-bold text-white">Find your events</h1>
            <div class="relative flex justify-center overflow-hidden py-6 sm:py-12">
                <div class="flex flex-wrap justify-center">
                    @if($publishedEvents->isEmpty())
                    <div class="text-white text-center">
                        <p>No events found in this category.</p>
                    </div>
                @else
                    @foreach ($publishedEvents as $event)
                        <div class="m-3">
                            <x-events-cards :event="$event"></x-events-cards>
                        </div>
                    @endforeach
                @endif
                </div>
            </div>
        </div>
    </section>
    <section class="bg-black overflow-visible my-0 py-24 mt-0">
        <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4 bg-black"
            aria-label="Table navigation">
            <span class="text-sm font-normal text-gray-500">
                {{ $publishedEvents->firstItem() }}-{{ $publishedEvents->lastItem() }} of {{ $publishedEvents->total() }}
            </span>
            <ul class="inline-flex items-stretch -space-x-px">
                {{ $publishedEvents->links() }}
            </ul>
        </nav>
    </section>

    <section class="bg-black overflow-visible my-0 py-24 mt-0">
        <div class="text-white items-center text-center flex flex-col">
            <h2 class="font-bold text-2xl lg:text-4xl">Embark on an Adventure</h2>
            <p class="mx-auto mt-6 max-w-xl text-lg md:text-xl leading-8 text-slate-400">
                Take a thrilling journey through our product's features. Book an adventurous demo and discover endless
                possibilities.
            </p>
            <a class="mt-8 rounded-md bg-white px-5 py-2.5 text-base font-semibold leading-7 text-black hover:bg-gray-200 transition focus:outline-none focus:ring focus:border-blue-300"
                href="#">Claim Your 15% off Adventure! Start Now</a>
        </div>
    </section>
    <style>
        .video-docker video {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
    </style>
@endsection
