@extends('layout.app')
@section('content')

    <div class="relative overflow-hidden bg-white">
        <div class="pt-16 pb-80 sm:pt-24 sm:pb-40 lg:pt-40 lg:pb-48">
            <div class="relative mx-auto max-w-7xl px-4 sm:static sm:px-6 lg:px-8">
                <div class="sm:max-w-lg">
                    <h1 class="font text-4xl font-bold tracking-tight text-gray-900 sm:text-6xl">Experience Cultural Wonders
                    </h1>
                    <p class="mt-4 text-xl text-gray-500">Immerse yourself in the rich tapestry of cultural events this
                        season. Let our events transport you to realms of beauty and inspiration, shielding you from the
                        mundane and connecting you to the heartbeat of humanity.</p>
                </div>
                <div>
                    <div class="mt-10">
                        <!-- Decorative image grid -->
                        <div aria-hidden="true"
                            class="pointer-events-none lg:absolute lg:inset-y-0 lg:mx-auto lg:w-full lg:max-w-7xl">
                            <div
                                class="absolute transform sm:left-1/2 sm:top-0 sm:translate-x-8 lg:left-1/2 lg:top-1/2 lg:-translate-y-1/2 lg:translate-x-8">
                                <div class="flex items-center space-x-6 lg:space-x-8">
                                    <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="h-64 w-44 overflow-hidden rounded-lg sm:opacity-0 lg:opacity-100">
                                            <img src="images/14.jpg" class="h-full w-full object-cover object-center">
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="images/10.jpg" alt=""
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                    </div>
                                    <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="images/11.jpg" alt=""
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="images/12.jpg" alt=""
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="images/13.jpg" alt=""
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                    </div>
                                    <div class="grid flex-shrink-0 grid-cols-1 gap-y-6 lg:gap-y-8">
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="images/14.jpg" alt=""
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                        <div class="h-64 w-44 overflow-hidden rounded-lg">
                                            <img src="images/15.jpg" alt=""
                                                class="h-full w-full object-cover object-center">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <a href="{{ route('register') }}"
                            class="inline-block rounded-md border border-transparent bg-indigo-600 py-3 px-8 text-center font-medium text-white hover:bg-indigo-700">
                            Start here</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <div class="flex justify-center">
        <x-alert />
    </div>

    <div class="p-10">
        <h1 class="text-center text-3xl font-bold">Find your events</h1>
        <div class="relative flex justify-center overflow-hidden py-6 sm:py-12">
            <div class="flex flex-wrap justify-center">
                @if ($publishedEvents->isEmpty())
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
@endsection
