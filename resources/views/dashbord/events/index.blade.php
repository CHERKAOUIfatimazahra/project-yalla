@extends('layout.add')

@section('content')
    <div class="p-4 sm:ml-64">
        <section class="bg-white p-3 sm:p-5"
            style="background-image: url('https://cdn1.vectorstock.com/i/1000x1000/79/30/events-background-with-maple-leaves-vector-10537930.jpg')">
            <div class="mx-auto max-w-screen-xl px-4 lg:px-12">
                <div class="bg-white shadow-md sm:rounded-lg overflow-hidden">
                    <div
                        class="flex flex-col md:flex-row items-center justify-between space-y-3 md:space-y-0 md:space-x-4 p-4">

                        <x-alert />
                        <div class="w-full md:w-1/2">
                            <!-- Search Form (if needed) -->
                        </div>
                        @if (auth()->user()->hasRole('organizer'))
                            <div
                                class="w-full md:w-auto flex flex-col md:flex-row space-y-2 md:space-y-0 items-stretch md:items-center justify-end md:space-x-3 flex-shrink-0">
                                <a href="{{ route('events.create') }}"
                                    class="flex items-center justify-center text-white bg-primary-700 hover:bg-primary-800 focus:ring-4 focus:ring-primary-300 font-medium rounded-lg text-sm px-4 py-2"
                                    style="background-color: #0000ff;">
                                    <svg class="h-3.5 w-3.5 mr-2" fill="currentColor" viewBox="0 0 20 20"
                                        xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                                        <path clip-rule="evenodd" fill-rule="evenodd"
                                            d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z" />
                                    </svg>
                                    Add Event
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm text-left text-gray-500">
                            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                <tr>
                                    <th scope="col" class="px-4 py-3">Title</th>
                                    <th scope="col" class="px-4 py-3">Location</th>
                                    <th scope="col" class="px-4 py-3">Start Date</th>
                                    <th scope="col" class="px-4 py-3">End Date</th>
                                    <th scope="col" class="px-4 py-3">Type</th>
                                    <th scope="col" class="px-4 py-3">price</th>
                                    <th scope="col" class="px-4 py-3">tickets_available</th>
                                    @if (auth()->user()->hasRole('admin'))
                                        <th scope="col" class="px-4 py-3">publish</th>
                                    @endif
                                    <th></th>
                                    @if (auth()->user()->hasRole('organizer'))
                                        <th scope="col" class="px-4 py-3">Actions</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($events as $event)
                                    <tr class="border-b">
                                        <td class="px-4 py-3">{{ $event->title }}</td>
                                        <td class="px-4 py-3">{{ $event->location }}</td>
                                        <td class="px-4 py-3">{{ $event->start_datetime }}</td>
                                        <td class="px-4 py-3">{{ $event->end_datetime }}</td>
                                        <td class="px-4 py-3">{{ $event->type }}</td>
                                        <td class="px-4 py-3">{{ $event->price }}</td>
                                        <td class="px-4 py-3">{{ $event->tickets_available }}</td>
                                        @if (auth()->user()->hasRole('admin'))
                                            <td class="px-4 py-3">
                                                @if ($event->is_published)
                                                    <form method="post"
                                                        action="{{ route('changePublishedStatus', $event->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="is_published"
                                                            value="{{ 0 }}">
                                                        <button
                                                            class="px-2 rounded py-1 bg-red-500 text-white font-bold">Unpublished</button>
                                                    </form>
                                                @else
                                                    <form method="post"
                                                        action="{{ route('changePublishedStatus', $event->id) }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <input type="hidden" name="is_published"
                                                            value="{{ 1 }}">
                                                        <button
                                                            class="px-2 rounded py-1 bg-green-500 text-white font-bold">Published</button>
                                                    </form>
                                                @endif
                                            </td>
                                        @endif
                                        <td class="px-4 py-3">{{ $event->status }}</td>
                                        <td class="px-4 py-3">

                                            @if (auth()->user()->hasRole('organizer'))
                                                <a href="{{ route('events.show', $event->id) }}"
                                                    class="text-primary-600 hover:text-primary-900">View</a>
                                                <a href="{{ route('events.edit', $event->id) }}"
                                                    class="text-indigo-600 hover:text-indigo-900">Edit</a>
                                                <form action="{{ route('events.destroy', $event->id) }}" method="POST"
                                                    class="inline"
                                                    onsubmit="return confirm('Are you sure you want to delete this event ?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="text-red-600 hover:text-red-900">Delete</button>
                                                </form>

                                                <a href="{{ route('events.reservations.index', $event->id) }}"
                                                    class="text-green-600 hover:text-green-900">Reservation</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <nav class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-3 md:space-y-0 p-4 bg-white"
                        aria-label="Table navigation">
                        <span class="text-sm font-normal text-gray-500">
                            {{ $events->firstItem() }}-{{ $events->lastItem() }} of {{ $events->total() }}
                        </span>
                        <ul class="inline-flex items-stretch -space-x-px">
                            {{ $events->links('pagination.custom-pagination') }}
                        </ul>
                    </nav>
                </div>
            </div>
        </section>
    </div>
@endsection
