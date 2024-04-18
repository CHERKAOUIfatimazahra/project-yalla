@extends('layout.app')

@section('content')
    <section>
        <div class="w-full">
            <div class="flex bg-white" style="height:600px;">
                <div class="flex items-center text-center lg:text-left px-8 md:px-12 lg:w-1/2">
                    <div>
                        <h2 class="text-3xl font-semibold text-gray-800 md:text-4xl">Build Your New <span
                                class="text-indigo-600">Event</span></h2>
                        <p class="mt-2 text-sm text-gray-500 md:text-base">Lorem ipsum dolor sit amet, consectetur
                            adipisicing
                            elit. Blanditiis commodi cum cupiditate ducimus, fugit harum id necessitatibus odio quam quasi,
                            quibusdam rem tempora voluptates. Cumque debitis dignissimos id quam vel!</p>
                        <div class="flex justify-center lg:justify-start mt-6">
                            <a class="px-4 py-3 bg-gray-900 text-gray-200 text-xs font-semibold rounded hover:bg-gray-800"
                                href="/register">Get Started</a>
                            <a class="mx-4 px-4 py-3 bg-gray-300 text-gray-900 text-xs font-semibold rounded hover:bg-gray-400"
                                href="/about">Learn More</a>
                        </div>
                    </div>
                </div>
                <div class="hidden lg:block lg:w-1/2" style="clip-path:polygon(10% 0, 100% 0%, 100% 100%, 0 100%)">
                    <div class="h-full object-cover" style="background-image: url('images/events1.jpg')">
                        <div class="h-full bg-black opacity-25"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="max-w-4xl mx-auto p-3">
            <x-alert />
            <div class="flex flex-col">
                <form id="searchForm">
                    <div class="relative mb-10 w-full flex  items-center justify-between rounded-md">
                        <svg class="absolute left-2 block h-5 w-5 text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <circle cx="11" cy="11" r="8" class=""></circle>
                            <line x1="21" y1="21" x2="16.65" y2="16.65" class=""></line>
                        </svg>
                        <input type="search" id="search_string" name="search"
                            class="h-12 w-full cursor-text rounded-md border border-gray-100 bg-gray-100 py-4 pr-40 pl-12 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                            placeholder="Search by title, organizer" />
                    </div>

                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

                        <div class="flex flex-col">
                            <label for="category" class="text-sm font-medium text-stone-600">category</label>
                            <select id="category"
                                class="mt-2 block w-full rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                <option value="0" selected>All</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="flex flex-col">
                            <label for="start_date" class="text-sm font-medium text-stone-600">start_date</label>
                            <input type="date" id="start_date"
                                class="mt-2 block w-full cursor-pointer rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        </div>

                        <div class="flex flex-col">
                            <label for="end_date" class="text-sm font-medium text-stone-600">end_date</label>
                            <input type="date" id="end_date"
                                class="mt-2 block w-full cursor-pointer rounded-md border border-gray-100 bg-gray-100 px-2 py-2 shadow-sm outline-none focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50" />
                        </div>

                        <div class="mt-6 grid w-full grid-cols-2 justify-end space-x-4 md:flex">
                            <button id="searchBtn"
                                class="rounded-lg bg-blue-600 px-8 py-2 font-medium text-white outline-none hover:opacity-80 focus:ring">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div >
            <h1 class="text-center text-3xl font-bold">Find your events</h1>
            <div class="relative flex justify-center overflow-hidden py-6 sm:py-12">
                <div id="placeSearchResult" class="flex flex-wrap justify-center">
                    @foreach ($publishedEvents as $event)
                        <div class="m-3">
                            <x-events-cards :event="$event"></x-events-cards>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
        {{ $publishedEvents->links() }}
    </section>
@php
    $dateTime = new DateTime($event->end_datetime);
    $currentDateTime = new DateTime();
    $reserveText = ($dateTime > $currentDateTime) ? 'Reserve now' : 'Reserve end';
@endphp
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script>
        $(document).ready(function() {
    $('#searchForm').submit(function(e) {
        e.preventDefault();
        var search_string = $('#search_string').val();
        var token = $("meta[name='csrf-token']").attr("content");
        var category = $("#category").val();
        var start_date = $("#start_date").val();
        var end_date = $("#end_date").val();

        $.ajax({
            type: 'GET',
            url: '/search',
            headers: {
                'XSRF-TOKEN': token
            },
            data: {
                search_string: search_string,
                category: category,
                start_date: start_date,
                end_date: end_date
            },
            success: function(response) {
                if (response.events && response.events.length > 0) {
                    var eventsHtml = '';
                    response.events.forEach(function(event) {
                        var reserveText = (new Date(event.end_datetime) > new Date()) ? 'Reserve now' : 'Reserve end';
                        var disabledAttribute = (reserveText === 'Reserve end') ? 'disabled' : '';
                        eventsHtml += '<div class="bg-white shadow-[0_8px_12px_-6px_rgba(0,0,0,0.2)] border p-2 w-96 rounded-lg font-[sans-serif] overflow-hidden m-2 mt-4">';
                        eventsHtml += '<div class="flex items-center justify-between px-4 mt-2">';
                        eventsHtml += '<img src="http://127.0.0.1:8000/uploads/events/' + event.image + '" class="w-full h-56 rounded-lg" /> </div> ';
                        eventsHtml += '<div class="px-4 my-6 text-center">';
                        eventsHtml += '<h3 class="text-lg font-semibold">' + event.title.substring(0, 20) + '...</h3>';
                        eventsHtml += '<p class="mt-2 text-sm text-gray-400">' + event.description.substring(0, 80) + '...</p>';
                        eventsHtml += '</div>';
                        eventsHtml += '<div class="flex justify-between items-center ">';
                        eventsHtml += '<span>' + event.start_datetime + '</span>';
                        eventsHtml += '<span class="px-2 py-1 border rounded-sm">' + event.categories.name + '</span>';
                        eventsHtml += '</div>';
                        eventsHtml += '<div class="mt-4 flex items-center flex-wrap gap-4">';
                        eventsHtml += '<h3 class="text-xl text-[#333] font-bold flex-1">£' + event.price + '</h3>';
                        eventsHtml += '<form method="post" class="flex gap-1" action="{{ route('events.reserve', ['eventId' => 'event->id']) }}/' +
                                event.id + '">';
                            eventsHtml += '@csrf';
                        eventsHtml += '<input type="hidden" name="_token" value="' + token + '">';
                        eventsHtml += '<button ' + disabledAttribute + ' class="select-none rounded-lg bg-pink-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">' + reserveText + '</button>';
                        eventsHtml += '</form>';
                        eventsHtml += '</div>';
                        eventsHtml += '<a type="button" href="/events/' + event.id + '" class="px-6 py-2 w-full mt-4 text-center rounded-lg text-white text-sm tracking-wider font-semibold border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">View</a>';
                        eventsHtml += '</div>';
                    });
                    $('#placeSearchResult').html(eventsHtml);
                } else {
                    $('#placeSearchResult').html('<p>No events found</p>');
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
            }
        });
    });
});


    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
@endsection
