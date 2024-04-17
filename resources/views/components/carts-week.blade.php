<section class="bg-gray-100 py-6 p-20">
    <div x-data="swipeCardsWeek()" x-init="let isDown = false;
        let startX;
        let scrollLeft;
        $el.addEventListener('mousedown', (e) => {
            isDown = true;
            startX = e.pageX - $el.offsetLeft;
            scrollLeft = $el.scrollLeft;
        });
        $el.addEventListener('mouseleave', () => {
            isDown = false;
        });
        $el.addEventListener('mouseup', () => {
            isDown = false;
        });
        $el.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - $el.offsetLeft;
            const walk = (x - startX) * 1;
            $el.scrollLeft = scrollLeft - walk;
        });" class="overflow-x-scroll scrollbar-hide mb-4 relative px-0.5"
        style="overflow-y: hidden;">
        <div class="flex snap-x snap-mandatory gap-4" style="width: max-content;">
            <template x-for="card in cards" :key="card.id">
                <div class="flex-none w-64 snap-center">
                    <div class="bg-white border-1 border border-gray-200 rounded-lg overflow-hidden mb-4">
                        <img :src="card.image" alt="" class="w-full h-40 object-cover">
                        <div class="p-4">
                            <h3 class="text-lg leading-6 font-bold text-gray-900" x-text="card.title"></h3>
                            <p class="text-gray-600 mt-2 text-sm" x-text="card.description"></p>
                            <div class="mt-4 flex items-center justify-between px-4">
                                <div>
                                    <h3 class="text-xl text-[#333] font-bold flex-1" x-text="'$'+card.price"></h3>
                                </div>
                                <div class="flex gap-1">
                                    <form x-bind:action="card.reserve_route" method="post" x-show="card.end_datetime > currentDateTime">
                                        @csrf 
                                        <button type="submit" class="select-none rounded-lg bg-pink-500 py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-pink-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none">
                                            Reserve now
                                        </button>
                                    </form>
                                    <button class="select-none rounded-lg bg-black py-2 px-4 text-center align-middle font-sans text-xs font-bold uppercase text-white shadow-md shadow-white-500/20 transition-all hover:shadow-lg hover:shadow-pink-500/40 focus:opacity-[0.85] focus:shadow-none active:opacity-[0.85] active:shadow-none disabled:pointer-events-none disabled:opacity-50 disabled:shadow-none" x-show="!(card.end_datetime > currentDateTime)">
                                        Reserve end
                                    </button>
                                </div>
                            </div>
                            <div class="flex items-center">
                                <a href="#" class="flex items-center">
                                    <img :src="card.user.image" class="h-10 w-10 rounded-full mr-2" alt="User Avatar">
                                    <span class="text-gray-700" x-text="card.user.name"></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>
</section>

<script>
    function swipeCardsWeek() {
        return {
            cards: [
                @foreach ($eventsOfWeek as $event)
                    {
                        id: {{ $event->id }},
                        image: '{{ asset("uploads/events/$event->image") }}',
                        title: '{{ $event->title }}',
                        description: '{{ $event->description }}',
                        price: {{ $event->price }},
                        end_datetime: '{{ $event->end_datetime }}',
                        reserve_route: '{{ route('events.reserve', ['eventId' => $event->id]) }}',
                        user: {
                            image: '{{ asset("images/{$event->user->image}") }}',
                            name: '{{ $event->user->name }}'
                        }
                    },
                @endforeach
            ],
            currentDateTime: new Date().toISOString().slice(0, 19).replace('T', ' ')
        };
    }
</script>
