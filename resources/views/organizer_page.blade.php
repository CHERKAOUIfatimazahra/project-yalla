@extends('layout.app')

@section('content')
    <section class="w-full overflow-hidden white:bg-gray-900">
        <div class="w-full mx-auto">
            <!-- User Cover IMAGE -->
            <img src="images/events2.jpg"
                alt="User Cover" class="w-full xl:h-[20rem] lg:h-[22rem] md:h-[16rem] sm:h-[13rem] xs:h-[9.5rem]" />

            <!-- User Profile Image -->
            <div class="w-full mx-auto flex justify-center">
                <img src="{{ $user->image ? asset("images/" . $user->image) : 'https://static.vecteezy.com/system/resources/previews/005/544/718/non_2x/profile-icon-design-free-vector.jpg' }}"
                    alt="User Profile"
                    class="rounded-full object-cover xl:w-[16rem] xl:h-[16rem] lg:w-[16rem] lg:h-[16rem] md:w-[12rem] md:h-[12rem] sm:w-[10rem] sm:h-[10rem] xs:w-[8rem] xs:h-[8rem] outline outline-2 outline-yellow-500 shadow-xl relative xl:bottom-[7rem] lg:bottom-[8rem] md:bottom-[6rem] sm:bottom-[5rem] xs:bottom-[4.3rem]" />
            </div>
                <h1 class="text-center text-gray-800 white:text-white text-4xl font-serif">{{ $user->name }}</h1>
                <!-- End Organizer events section -->
            </div>

            <!-- Organizer events section -->
            <h1 class="text-center text-3xl font-bold">Organizer Events</h1>
            <div class="flex justify-center">
                <x-alert />
            </div>
            <div class="relative flex justify-center overflow-hidden py-6 sm:py-12">
                <div class="flex flex-wrap justify-center" id="eventResults">
                    @foreach ($userEvents as $event)
                        <div class="m-3">
                            <x-events-cards :event="$event"></x-events-cards>
                        </div>
                    @endforeach
                </div>
            </div>
            {{ $userEvents->links() }}
        </div>
    </section>
@endsection
