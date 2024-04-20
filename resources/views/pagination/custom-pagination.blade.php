@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Pagination Navigation" class="flex justify-center">
        {{-- Previous Page Link --}}
        @if ($paginator->onFirstPage())
            <span aria-disabled="true" aria-label="@lang('pagination.previous')">
                <span
                    class="cursor-default relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-l-md">
                    Previous
                </span>
            </span>
        @else
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"
                class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-l-md hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 transition duration-150 ease-in-out">
                Previous
            </a>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span aria-disabled="true">
                    <span
                        class="cursor-default relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-400 bg-white border border-gray-300">
                        {{ $element }}
                    </span>
                </span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span aria-current="page">
                            <span
                                class="cursor-default relative inline-flex items-center px-3 py-1 text-sm font-medium text-white bg-blue-500 border border-gray-300">
                                {{ $page }}
                            </span>
                        </span>
                    @else
                        <a href="{{ $url }}"
                            class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 transition duration-150 ease-in-out">
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        {{-- Next Page Link --}}
        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"
                class="relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-r-md hover:bg-gray-100 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 transition duration-150 ease-in-out">
                Next
            </a>
        @else
            <span aria-disabled="true" aria-label="@lang('pagination.next')">
                <span
                    class="cursor-default relative inline-flex items-center px-3 py-1 text-sm font-medium text-gray-400 bg-white border border-gray-300 rounded-r-md">
                    Next
                </span>
            </span>
        @endif
    </nav>
@endif
