@props(['event'])

<div
    class="bg-white shadow-[0_8px_12px_-6px_rgba(0,0,0,0.2)] border p-2    w-96 rounded-lg font-[sans-serif] overflow-hidden m-2 mt-4">
    <img src="{{ asset("/uploads/events/{$event->image}") }}" class="w-full h-56 rounded-lg" />

    <div class="px-4 my-6 text-center">
        <h3 class="text-lg font-semibold">{{ Str::limit($event->title, 20, '...') }}</h3>
        <p class="mt-2 text-sm text-gray-400">{{ Str::limit($event->description, 80, '...') }}</p>

    </div>
    <div class="flex justify-between  items-center ">
        <span>{{ \Carbon\Carbon::parse($event->start_datetime)->format('Y-F-d') }}</span>
        <span class="px-2 py-1 border rounded-sm">{{ $event->categories->name }}</span>
    </div>

    <div class="mt-4 flex items-center flex-wrap gap-4">
        <h3 class="text-xl text-[#333] font-bold flex-1">£{{ $event->price }}</h3>
        <form method="post" class="flex gap-1 " action="{{ route('events.reserve', ['eventId' => $event->id]) }}">
            @csrf
            <button
                class="select-none rounded-lg bg-pink-500 py-3.5 px-7 text-center align-middle font-sans text-sm font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                Reserve now</button>
        </form>
    </div>
    <a type="button" href="{{ route('events.eventShow', ['event' => $event->id]) }}"
        class="px-6 py-2 w-full mt-4 text-center rounded-lg text-white text-sm tracking-wider font-semibold border-none outline-none bg-blue-600 hover:bg-blue-700 active:bg-blue-600">View</a>
</div>
