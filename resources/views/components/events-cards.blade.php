@props(['event'])

{{-- <div class="relative flex w-full max-w-[26rem] flex-col rounded-xl bg-white bg-clip-border text-gray-700 shadow-lg">
    <div
        class="relative mx-4 mt-4 overflow-hidden rounded-xl bg-blue-gray-500 bg-clip-border text-white shadow-lg shadow-blue-gray-500/40">
        <img src="{{ asset('uploads/events/' . $event->image) }}" alt="{{ $event->name }}"
            class="rounded-xl w-full h-48 object-cover" />
        <div
            class="to-bg-black-10 absolute inset-0 h-full w-full bg-gradient-to-tr from-transparent via-transparent to-black/60">
        </div>
        <button
            class="!absolute top-4 right-4 h-8 max-h-[32px] w-8 max-w-[32px] select-none rounded-full text-center align-middle font-sans text-xs font-medium uppercase text-red-500 transition-all hover:bg-red-500/10 active:bg-red-500/30 disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
            type="button" data-ripple-dark="true">
            <span class="absolute top-1/2 left-1/2 -translate-y-1/2 -translate-x-1/2 transform">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="h-6 w-6">
                    <path
                        d="M11.645 20.91l-.007-.003-.022-.012a15.247 15.247 0 01-.383-.218 25.18 25.18 0 01-4.244-3.17C4.688 15.36 2.25 12.174 2.25 8.25 2.25 5.322 4.714 3 7.688 3A5.5 5.5 0 0112 5.052 5.5 5.5 0 0116.313 3c2.973 0 5.437 2.322 5.437 5.25 0 3.925-2.438 7.111-4.739 9.256a25.175 25.175 0 01-4.244 3.17 15.247 15.247 0 01-.383.219l-.022.012-.007.004-.003.001a.752.752 0 01-.704 0l-.003-.001z">
                    </path>
                </svg>
            </span>
        </button>
    </div>
    <div class="p-6">
        <div class="mb-3 flex items-center justify-between">
            <h3 class="block font-sans text-xl font-medium leading-snug tracking-normal text-blue-gray-900 antialiased">
                {{ $event->title }}
            </h3>
            <p
                class="flex items-center gap-1.5 font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" aria-hidden="true"
                    class="-mt-0.5 h-5 w-5 text-yellow-700">
                    <path fill-rule="evenodd"
                        d="M10.788 3.21c.448-1.077 1.976-1.077 2.424 0l2.082 5.007 5.404.433c1.164.093 1.636 1.545.749 2.305l-4.117 3.527 1.257 5.273c.271 1.136-.964 2.033-1.96 1.425L12 18.354 7.373 21.18c-.996.608-2.231-.29-1.96-1.425l1.257-5.273-4.117-3.527c-.887-.76-.415-2.212.749-2.305l5.404-.433 2.082-5.006z"
                        clip-rule="evenodd"></path>
                </svg>
                {{ $event->type }}
            </p>
        </div>
        
        <p class="block font-sans text-base font-light leading-relaxed text-gray-700 antialiased">
            {{ $event->start_datetime }}
        </p>
        <P
            class="flex items-center gap-1.5 font-sans text-base font-normal leading-relaxed text-blue-gray-900 antialiased">
            {{ $event->price }}DH
        </p>

        <form action="{{ route('events.eventShow', ['event' => $event->id]) }}" method="GET">
            @csrf
            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded">
                Read more
            </button>
        </form>
    </div>
    <div class="p-6 pt-3">
        <form action="{{ route('events.reserve', ['eventId' => $event->id]) }}" method="POST">
            @csrf
            <button
                class="block w-full select-none rounded-lg bg-pink-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none"
                type="submit" data-ripple-light="true">
                Reserve
            </button>
        </form>
    </div>
</div>



<!-- stylesheet -->
<link rel="stylesheet" href="https://unpkg.com/@material-tailwind/html@latest/styles/material-tailwind.css" />

<!-- from cdn -->
<script src="https://unpkg.com/@material-tailwind/html@latest/scripts/ripple.js"></script> --}}


<div
    class="bg-white shadow-[0_8px_12px_-6px_rgba(0,0,0,0.2)] border p-2    w-96 rounded-lg font-[sans-serif] overflow-hidden m-2 mt-4">
    <img src="{{ asset("/uploads/events/{$event->image}") }}" class="w-full h-56 rounded-lg" />

    <div class="px-4 my-6 text-center">
        <h3 class="text-lg font-semibold">{{ Str::limit($event->title, 20, '...') }}</h3>
        <p class="mt-2 text-sm text-gray-400">{{ Str::limit($event->description, 80, '...') }}</p>

    </div>
    <div class="flex justify-between  items-center ">
        <span>{{ \Carbon\Carbon::parse($event->date)->format('Y-F-d h:m') }}</span>
        <span class="px-2 py-1 border rounded-sm">{{ $event->categories->name }}</span>
    </div>
    
    <div class="mt-4 flex items-center flex-wrap gap-4">
        <h3 class="text-xl text-[#333] font-bold flex-1">$ {{ $event->price }}</h3>
        @auth
            <form method="post" class="flex gap-1 " action="{{route('events.reserve', ['eventId' => $event->id]) }}">
                @csrf
                <div class="w-32">
                    <div class="relative flex items-center max-w-[8rem]">
                        <button type="button" id="decrement-button"
                            data-input-counter-decrement="quantity-input{{ $event->id }}"
                            class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M1 1h16" />
                            </svg>
                        </button>
                        <input max="4" min="1" name="numberOfTicket" value="1" type="number"
                            id="quantity-input{{ $event->id }}" data-input-counter
                            aria-describedby="helper-text-explanation"
                            class="bg-gray-50 border-x-0 border-gray-300 h-11 text-center text-gray-900 text-sm focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="2" required />
                        <button type="button" id="increment-button"
                            data-input-counter-increment="quantity-input{{ $event->id }}"
                            class="bg-gray-100 dark:bg-gray-700 dark:hover:bg-gray-600 dark:border-gray-600 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 dark:focus:ring-gray-700 focus:ring-2 focus:outline-none">
                            <svg class="w-3 h-3 text-gray-900 dark:text-white" aria-hidden="true"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M9 1v16M1 9h16" />
                            </svg>
                        </button>
                    </div>

                </div>

                <button
                    class="px-6 py-2.5 rounded text-[#333] text-sm tracking-wider font-semibold border-2 border-[#333] hover:bg-gray-50 outline-none">Order
                    now</button>
            </form>
        @else
            <a href="{{ route('login') }}"
                class="px-6 py-2.5 rounded text-[#333] text-sm tracking-wider font-semibold border-2 border-[#333] hover:bg-gray-50 outline-none">login
                to get ticket</a>
        @endauth
    </div>

    <a type="button" href="{{ route('events.eventShow', ['event' => $event->id]) }}"
        class="px-6 py-2 w-full mt-4 text-center rounded-lg text-white text-sm tracking-wider font-semibold border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">View</a>

</div>


