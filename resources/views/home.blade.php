@extends('layout.app')

@section('content')
    <section class="">
        <div id="default-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-100 overflow-hidden rounded-lg md:h-96">
                <!-- Item 1 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events1.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 2 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events2.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 3 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events3.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 4 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events4.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 5 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events5.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 6 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events6.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
                <!-- Item 7 -->
                <div class="hidden duration-700 ease-in-out" data-carousel-item>
                    <img src="images/events7.jpg"
                        class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                </div>
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1"
                    data-carousel-slide-to="0"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2"
                    data-carousel-slide-to="1"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 3"
                    data-carousel-slide-to="2"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 4"
                    data-carousel-slide-to="3"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 5"
                    data-carousel-slide-to="4"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 6"
                    data-carousel-slide-to="5"></button>
                <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 7"
                    data-carousel-slide-to="6"></button>
            </div>
            <!-- Slider controls -->
            <button type="button"
                class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-prev>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M5 1 1 5l4 4" />
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button"
                class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                data-carousel-next>
                <span
                    class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 9 4-4-4-4" />
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </section>
    <!-- Popular events section -->
    <section class="bg-gray-100 py-6 p-20">
        <h1 class="text-center text-3xl font-bold m-3">Popular Events</h1>
        <div class="m-3">
            <x-carts-carousel :popularEvents="$popularEvents"></x-carts-carousel>
        </div>
    </section>
    {{-- end Popular enets section --}}
    {{-- <section class="bg-white-100 py-6 p-20">
        <div class="container relative z-40 mx-auto mt-12">
            <div class="flex flex-w justify-center mx-auto lg:w-full md:w-5/6 xl:shadow-small-blue">

                <!-- Business Events -->
                <a href="/business" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <i class="fa-solid fa-briefcase fa-2xl"></i>
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Business
                        </p>
                    </div>
                </a>

                <!-- Social Events -->
                <a href="/social" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <i class="fa-solid fa-person-breastfeeding fa-2xl"></i>
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Social
                        </p>
                    </div>
                </a>

                <!-- Cultural Events -->
                <a href="/cultural" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <i class="fa-solid fa-people-group fa-2xl"></i>
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Cultural
                        </p>
                    </div>
                </a>

                <!-- Educational Events -->
                <a href="/educational" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <i class="fa-solid fa-person-chalkboard fa-2xl"></i>
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Educational
                        </p>
                    </div>
                </a>

                <!-- Sporting Events -->
                <a href="/sporting" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <i class="fa-solid fa-medal fa-2xl"></i>
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Sporting
                        </p>
                    </div>
                </a>

                <!-- Entertainment Events -->
                <a href="/entertainment" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <i class="fa-solid fa-music fa-2xl"></i>
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Entertainment
                        </p>
                    </div>
                </a>

                <!-- Gaming Events -->
                <a href="/gaming" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <i class="fa-solid fa-gamepad fa-2xl"></i>
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Gaming
                        </p>
                    </div>
                </a>

                <!-- Anime Events -->
                <a href="/gaming" class="block w-1/2 py-10 text-center border lg:w-1/4">
                    <div>
                        <i class="fa-solid fa-keyboard fa-2xl"></i>
                        <i class="fa-solid fa-laptop-code fa-2xl"></i>
                        <p
                            class="pt-4 text-sm font-medium capitalize font-body text-green-900 lg:text-lg md:text-base md:pt-6">
                            Gaming
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </section> --}}

    {{-- section for filter and events cards --}}
    <section>
        {{-- start filter --}}
        <div class="flex items-center justify-center py-4 md:py-8 flex-wrap">
            @foreach ($categories as $category)
                @if ($category->eventsCategory()->exists())
                    <form id="filterForm{{ $category->id }}">
                        <button type="button" onclick="filterEvents({{ $category->id }})"
                            class="category-btn text-black-700 hover:text-white border border-purple-600 bg-white hover:bg-purple-700 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-full text-base font-medium px-5 py-2.5 text-center me-3 mb-3 transition-all">
                            {{ $category->name }}
                        </button>
                    </form>
                @endif
            @endforeach
        </div>

        <div class="flex justify-center">
            <x-alert />
        </div>

        <div id="eventsContainer">
            <h1 class="text-center text-3xl font-bold">Find your events</h1>
            <div class="relative flex justify-center overflow-hidden py-6 sm:py-12">
                <div class="flex flex-wrap justify-center" id="eventResults">
                    @foreach ($publishedEvents as $event)
                        <div class="m-3">
                            <x-events-cards :event="$event"></x-events-cards>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center m-3">
                <a href="/find-event">
                    <button
                        class="px-6 py-2 mt-4 text-center rounded-lg text-white text-sm tracking-wider font-semibold border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">
                        SHOW MORE EVENTS
                    </button>
                </a>
            </div>
        </div>
    </section>
    {{-- end section cart events --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        function filterEvents(categoryId) {

            $.ajax({
                url: `/search?category=${categoryId}`,
                method: 'GET',

                success: function(response) {
                    if (response.events && response.events.length > 0) {
                        var eventsHtml = '';
                        response.events.forEach(function(event) {
                            eventsHtml +=
                                '<div class="bg-white shadow-[0_8px_12px_-6px_rgba(0,0,0,0.2)] border p-2 w-96 rounded-lg font-[sans-serif] overflow-hidden m-2 mt-4">'

                            eventsHtml += ' <div class="flex items-center justify-between px-4 mt-2">';
                            if (event.image)
                                eventsHtml += '<img src="http://127.0.0.1:8000/uploads/events/' + event
                                .image + '" class="w-full h-56 rounded-lg" /> </div> ';
                            else eventsHtml +=
                                '<img src="http://127.0.0.1:8000/images/yalla.png" class="w-full h-56 rounded-lg" /> </div> ';

                            eventsHtml += '<div class="px-4 my-6 text-center">';

                            eventsHtml += '<h3 class="text-lg font-semibold">' + event.title.substring(
                                0, 20) + '...</h3>';
                            eventsHtml += '<p class="mt-2 text-sm text-gray-400">' + event.description
                                .substring(0, 80) + '...</p>';
                            eventsHtml += '</div>';
                            eventsHtml += '<div class="flex justify-between items-center ">';
                            eventsHtml += '<span>' + event.start_datetime + '</span>';
                            eventsHtml += '<span class="px-2 py-1 border rounded-sm">' + event
                                .categories.name + '</span>';
                            eventsHtml += '</div>';
                            eventsHtml += '<div class="mt-4 flex items-center flex-wrap gap-4">';
                            eventsHtml += '<h3 class="text-xl text-[#333] font-bold flex-1">£' + event
                                .price + '</h3>';
                            eventsHtml +=
                                '<form method="post" class="flex gap-1" action="/events/' + event.id +
                                '/reserve">';
                            eventsHtml += '@csrf';
                            eventsHtml +=
                                '<button class="select-none rounded-lg bg-pink-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">Book</button>';
                            eventsHtml += '</form>';

                            eventsHtml += '</div>';
                            eventsHtml +=
                                '<a type="button" href="/single_page/' + event.id +
                                '" class="px-6 py-2 w-full mt-4 text-center rounded-lg text-white text-sm tracking-wider font-semibold border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">View</a>';
                            eventsHtml += '</div>';
                        });
                        $('#eventResults').html(eventsHtml);
                    } else {
                        $('#eventResults').html('<p>No events found</p>');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });
        }
    </script>
    <!-- Events of the week section -->
    <section class="bg-gray-100 py-6 p-20">
        <h1 class="text-center text-3xl font-bold m-3">Events of the week</h1>
        <div class="m-3">
            <x-carts-week :eventsOfWeek="$eventsOfWeek"></x-carts-week>
        </div>
    </section>
    {{-- end events of the week --}}
    <section class="relative py-32 lg:py-36 bg-white">
        <div class="mx-auto lg:max-w-7xl w-full px-5 sm:px-10 md:px-12 lg:px-5 flex flex-col lg:flex-row gap-10 lg:gap-12">
            <div class="absolute w-full lg:w-1/2 inset-y-0 lg:right-0 hidden lg:block">
                <span
                    class="absolute -left-6 md:left-4 top-24 lg:top-28 w-24 h-24 rotate-90 skew-x-12 rounded-3xl bg-orange-400 blur-xl opacity-60 lg:opacity-95 lg:block hidden"></span>
                <span class="absolute right-4 bottom-12 w-24 h-24 rounded-3xl bg-blue-600 blur-xl opacity-80"></span>
            </div>
            <span
                class="w-4/12 lg:w-2/12 aspect-square bg-gradient-to-tr from-blue-600 to-green-400 absolute -top-5 lg:left-0 rounded-full skew-y-12 blur-2xl opacity-40 skew-x-12 rotate-90"></span>
            <div
                class="relative flex flex-col items-center text-center lg:text-left lg:py-7 xl:py-8 lg:items-start lg:max-w-none max-w-3xl mx-auto lg:mx-0 lg:flex-1 lg:w-1/2">
                <h1 class="text-3xl leading-tight sm:text-4xl md:text-5xl xl:text-6xl font-bold text-gray-900">
                    YALLA
                </h1>
                <p class="mt-8 text-gray-700">
                    "Ready to host your own event? Dive into our user-friendly platform and bring your ideas to life!
                    Whether it's a business meetup, a social gathering,
                    or a cultural showcase, create unforgettable experiences effortlessly.
                    Start planning now and make your event a reality!"
                </p>
                <div class="mt-10 w-full flex max-w-md mx-auto lg:mx-0">
                    <div class="flex sm:flex-row flex-col gap-5 w-full">
                        <a href="{{ route('register') }}"
                            class="flex text-white justify-center items-center w-max min-w-max sm:w-max px-6 h-12 rounded-full outline-none relative overflow-hidden border duration-300 ease-linear after:absolute after:inset-x-0 after:aspect-square after:scale-0 after:opacity-70 after:origin-center after:duration-300 after:ease-linear after:rounded-full after:top-0 after:left-0 after:bg-[#172554] hover:after:opacity-100 hover:after:scale-[2.5] bg-blue-600 border-transparent hover:border-[#172554]">
                            <span class="hidden sm:flex relative z-[5]">Start Creating Now</span>
                        </a>
                    </div>
                </div>

            </div>
            <div class="flex flex-1 lg:w-1/2 lg:h-auto relative lg:max-w-none lg:mx-0 mx-auto max-w-3xl">
                <img src="images/1.jpg" alt="Hero image" width="2350" height="2359"
                    class="lg:absolute lg:w-full lg:h-full rounded-3xl object-cover lg:max-h-none max-h-96">
            </div>
        </div>
    </section>
@endsection
