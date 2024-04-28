@extends('layout.app')
@section('content')
<div class="flex h-screen justify-center items-center bg-gray-50 dark:bg-gray-900 dark:text-white">
    <div class="text-center max-w-6xl mx-10">
        <h1 class="my-3 text-3xl font-bold tracking-tight text-gray-800 md:text-5xl dark:text-gray-100">
            Create Your Event
        </h1>
        <div>
            <p class="max-w-2xl mx-auto my-2 text-base text-gray-500 md:leading-relaxed md:text-xl dark:text-gray-400">
                Plan your event with us and make it a success! Get started now.
            </p>
        </div>
        <div class="flex flex-col items-center justify-center gap-5 mt-6 md:flex-row">
            <a class="inline-block w-auto text-center min-w-[200px] px-6 py-4 text-white transition-all rounded-md shadow-xl sm:w-auto bg-gradient-to-r from-blue-600 to-blue-500 hover:bg-gradient-to-b dark:shadow-blue-900 shadow-blue-200 hover:shadow-2xl hover:shadow-blue-400 hover:-tranneutral-y-px "
                href="{{ route('register') }}">Your Events
            </a>
            <a class="inline-block w-auto text-center min-w-[200px] px-6 py-4 text-white transition-all bg-gray-700 dark:bg-white dark:text-gray-800 rounded-md shadow-xl sm:w-auto hover:bg-gray-900 hover:text-white shadow-neutral-300 dark:shadow-neutral-700 hover:shadow-2xl hover:shadow-neutral-400 hover:-tranneutral-y-px"
                href="/find-event">Search Events
            </a>
        </div>
    </div>
</div>
<section class="w-full mx-auto py-10 bg-gray-50 dark:bg-gray-900 dark:text-white">
    <div class="w-fit pb-1 px-2 mx-4 rounded-md text-2xl font-semibold border-b-2 border-blue-600 dark:border-b-2 dark:border-yellow-600">Events</div>

    <div class="xl:w-[80%] sm:w-[85%] xs:w-[90%] mx-auto flex md:flex-row xs:flex-col lg:gap-4 xs:gap-2 justify-center lg:items-stretch md:items-center mt-4">
      <div class="lg:w-[50%] xs:w-full">
        <img class="lg:rounded-t-lg sm:rounded-sm xs:rounded-sm" src="{{asset('/images/yalla.png') }}" alt="event image" />
      </div>
      <div class="lg:w-[50%] sm:w-full xs:w-full bg-gray-100 dark:bg-gray-900 dark:text-gray-400 md:p-4 xs:p-0 rounded-md">
        <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Lorem ipsum dolor sit amet consectetur</h2>
        <p class="text-md mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda nam
          veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione eligendi
          sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus fuga
          nobis tempora possimus ullam!</p>
      </div>
    </div>
    <!-- col-2 -->
    <div class="xl:w-[80%] sm:w-[85%] xs:w-[90%] mx-auto flex md:flex-row xs:flex-col lg:gap-4 xs:gap-2 justify-center lg:items-stretch md:items-center mt-6">
      <!--  -->
      <div class="md:hidden sm:block xs:block xs:w-full">
        <img class="lg:rounded-t-lg sm:rounded-sm xs:rounded-sm" src="asset('/images/yalla.png')" alt="event image" />
      </div>
      <!--  -->
      <div class="lg:w-[50%] xs:w-full bg-gray-100 dark:bg-gray-900 dark:text-gray-400 md:p-4 xs:p-0 rounded-md">
        <h2 class="text-3xl font-semibold text-gray-900 dark:text-white">Lorem ipsum dolor sit amet consectetur</h2>

        <p class="text-md mt-4">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Tempore placeat assumenda nam
          veritatis, magni doloremque pariatur quos fugit ipsa id voluptatibus deleniti officiis cum ratione eligendi
          sed necessitatibus aliquam error laborum delectus quaerat. Delectus hic error eligendi sed repellat natus fuga
          nobis tempora possimus ullam!</p>
      </div>
      <!--  -->
      <div class="md:block sm:hidden xs:hidden lg:w-[50%] xs:w-full">
        <img class="lg:rounded-t-lg xs:rounded-sm" src="{{asset('/images/events1.jpg') }}" alt="event image" />
      </div>
    </div>
</section>
  <!-- Photo by '@candjstudios' & '@framesforyourheart' on Unsplash -->

@endsection
