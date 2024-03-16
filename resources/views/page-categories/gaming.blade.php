@extends('layout.agg')

@section('content')
    <!-- Hero Slider -->
    <section class="tf-section hero-slider">
        <div class="py-10 max-[499px]:pb-[20px] relative">
            <div class="container">
                <div class="flex items-center justify-between">
                    <div class="">
                        <div class="relative pt-[24px] text-start">
                            <h6 data-aos="fade-up" data-aos-duration="1000"
                                class="relative leading-[3.2] mb-[6px] after:absolute after:content-[''] after:bottom-0 after:w-[36px] after:h-[5px] after:bg-tf after:left-0 after:mx-auto after:text-center ">
                                Discover Your Next Adventure</h6>
                            <h2 data-aos="fade-up" data-aos-duration="1000" class="mb-[26px]">Explore Exciting Events Near
                                You</h2>
                            <p data-aos="fade-up" data-aos-duration="1000" class="text-[24px] mb-[43px]">Unlock a World of
                                Possibilities with Our Platform</p>
                            <a data-aos="fade-up" data-aos-duration="1000" href="about.html" class="btn-action style-2">Get
                                Connected</a>
                        </div>
                    </div>
                    <div class="">
                        <div data-aos="zoom-in" data-aos-duration="2000" class="">
                            <img data-aos="zoom-in" data-aos-duration="2000" class="w-[30rem] h-[27rem]"
                                src="{{ asset('assets/images/gaming.jpg') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Hero Slider -->

     <!-- Team -->
     <section class="tf-section team">
        <div class="pt-[139px] pb-[128px] max-[499px]:py-[40px]">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="relative text-center">
                            <h1
                                class="absolute left-[27px] right-0 top-[-40px] mx-auto text-center text-[240px] tracking-[24px] uppercase -z-10">
                                <span class="heading-bg">Events</span>
                            </h1>
                            <h5 data-aos="fade-up" data-aos-duration="1000"
                                class="relative leading-[3.2] mb-[10px] after:absolute after:content-[''] after:bottom-0 after:w-[36px] after:h-[5px] after:bg-tf after:left-0 after:right-0 after:mx-auto after:text-center ">
                                Top Events</h5>
                            <h3 data-aos="fade-up" data-aos-duration="1000" class="mb-[28px]">Our Amazing Events</h3>
                        </div>
                    </div>
                </div>
                <div class="row mt-[53px]">
                    <div class="col-md-12">
                        <div data-aos="fade-up" data-aos-duration="1000" class="swiper swiper-team">
                            <div class="swiper-wrapper flex">
                                {{-- @foreach ($events as $index => $event)
                                    <div class="swiper-slide pt-[51px]">
                                        <div
                                            class="bg-[#4526b1] rounded-[10px] py-[20px] px-[25px] text-center cursor-pointer mb-[112px] group">
                                            <div class="mt-[-71px] relative overflow-hidden">
                                                <img src="{{ asset('storage/events/' . $event->image) }}" alt="Monteno"
                                                    class="w-full h-40 rounded-[10px]">
                                            </div>
                                            <div class="pt-[30px]">
                                                <ul class="flex flex-col justify-start space-y-2 mt-3">
                                                    <li class=" pb-2"><a href="{{route('events.overview', $event->id)}}" class="block text-base bg-orange-500 py-1 rounded-full text-slate-50 hover:text-slate-50 ">{{ \Carbon\Carbon::parse($event->date)->format('d F Y') }}</a><a
                                                        href="{{route('events.overview', $event->id)}}" class="block text-base mt-2"><i
                                                                class="fa-solid fa-clock text-tf mr-2"></i>{{ \Carbon\Carbon::parse($event->date)->format('h:i A') }}</a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="flex items-center justify-center relative">
                                                <a href="{{route('events.overview', $event->id)}}"
                                                    class="font-somibold text-sm pb-1 text-slate-50 dark:text-white relative before:block before:content-[''] before:w-[36px] before:h-[3px] before:bg-[#fd562a]">Read
                                                    More</a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach --}}

                            </div>
                            <div class="swiper-pagination"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end Team -->

    <!-- About Us -->
    <section class="tf-section section-about">
        <div class="py-[170px] max-[1024px]:py-0 max-[499px]:py-[40px]">
            <div class="px-8">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-2">
                    <div class="">
                        <div
                            class="flex items-center max-[1024px]:pt-[50px] max-[767px]:flex-wrap max-[767px]:justify-around max-[1179px]:justify-center">
                            <div class="md:!mr-[30px] mr-0 max-[768px]:mb-[30px] max-[500px]:w-full">
                                <div class="rounded-[20px] flex items-end justify-center bg-none max-[500px]:w-full">
                                    <img class="animate-[move_3s_infinite_linear] rounded-full w-[32rem] h-[32rem]"
                                        src="assets/images/gaming1.jpg" alt="Monteno">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="relative pt-[20px]">
                            <h5 class="leading-[3.2] relative mb-[10px]
                                before::content-[''] before:w-[36px] before:h-[5px] before:absolute before:bottom-0 before:left-0 before:bg-[#fd562a]"
                                data-aos="fade-up" data-aos-duration="1000">
                                YALLA GAMING
                            </h5>
                            <h3 class="mb-[58px]" data-aos="fade-up" data-aos-duration="1000">Hight Quality NFT Collections
                            </h3>
                            <p class="text-[21px] mb-[33px]" data-aos="fade-up" data-aos-duration="1000">Sed ut perspiciatis
                                unde omnis iste natus enim ad minim veniam, quis nostrud exercit </p>
                            <p class="text-[18px] leading-[1.7] mb-[41px]" data-aos="fade-up" data-aos-duration="1000">Duis
                                aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                                pariatur. Excepteur sint occae cat cupidatat non proident, sunt in culpa qui officia dese
                                runt mollit anim id est laborum velit esse cillum dolore eu fugiat nulla pariatu epteur sint
                                occaecat</p>
                            <a href="about.html" class="btn-action style-2" data-aos="fade-up" data-aos-duration="1000">More
                                About Us</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end About Us -->

    

    <!-- Testimonial -->
    {{-- <section class="tf-section testimonials">
        <div class="p-[137px_0_142px] max-[499px]:py-[40px]">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="swiper swiper-testimonials">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <div class="flex items-start justify-center">
                                        <div data-aos="fade-right" data-aos-duration="1000"
                                            class="pr-[100px] pt-[31px] min-w-[600px]">
                                            <img class="rounded-[50%] w-[40rem]"
                                                src="{{ asset('assets/images/client02.jpg') }}" alt="Monteno">
                                        </div>
                                        <div class="relative">
                                            <h5
                                                class="leading-[3.2] relative mb-[10px]
                                            before::content-[''] before:w-[36px] before:h-[5px] before:absolute before:bottom-0 before:left-0 before:bg-[#fd562a] ">
                                                Testimonial
                                            </h5>
                                            <h3 class="mb-[8px]">What People Say </h3>
                                            <div class="flex items-start justify-center mt-[38px] pl-[7px]">
                                                <img src="assets/images/icon/left-quote.png" alt="Monteno">
                                                <div data-aos="fade-up" data-aos-duration="1000"
                                                    class="pt-[22px] pl-[24px]">
                                                    <p
                                                        class="text-[21px] italic leading-[1.6] tracking-[-0.2px] mb-[34px]">
                                                        Keniam, quis nostrud exerci ut aliquip ex ea com modo consequat.
                                                        Duis aute irure dolor in reprehen derit in voluptate velit esse
                                                        cillum dolore eu fugiat nulla parinon proident, sunt in culpa</p>
                                                    <div class="flex items-center justify-start">
                                                        <img class="w-14 h-14 rounded-full"
                                                            src="{{ asset('assets/images/client02.jpg') }}"
                                                            alt="Monteno">
                                                        <div class="flex flex-col justify-start pl-4">
                                                            <h6 class="text-orange-500">Yassir EL KHAILI</h6>
                                                            <p class="text-[16px] mb-[-5px]">Dev & Web</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-start justify-center">
                                        <div class="pr-[100px] pt-[31px] min-w-[600px]">
                                            <img class="rounded-[50%] w-[40rem]"
                                                src="{{ asset('assets/images/client05.jpg') }}" alt="Monteno">
                                        </div>
                                        <div class="relative">
                                            <h5
                                                class="leading-[3.2] relative mb-[10px]
                                            before::content-[''] before:w-[36px] before:h-[5px] before:absolute before:bottom-0 before:left-0 before:bg-[#fd562a] ">
                                                Testimonial
                                            </h5>
                                            <h3 class="mb-[8px]">What People Say </h3>
                                            <div class="flex items-start justify-center mt-[38px] pl-[7px]">
                                                <img src="assets/images/icon/left-quote.png" alt="Monteno">
                                                <div class="pt-[22px] pl-[24px]">
                                                    <p
                                                        class="text-[21px] italic leading-[1.6] tracking-[-0.2px] mb-[34px]">
                                                        Keniam, quis nostrud exerci ut aliquip ex ea com modo consequat.
                                                        Duis aute irure dolor in reprehen derit in voluptate velit esse
                                                        cillum dolore eu fugiat nulla parinon proident, sunt in culpa</p>
                                                    <div class="flex items-center justify-start">
                                                        <img class="w-14 h-14 rounded-full"
                                                            src="{{ asset('assets/images/client05.jpg') }}"
                                                            alt="Monteno">
                                                        <div class="flex flex-col justify-start pl-4">
                                                            <h6 class="text-orange-500">Abdelghani Ait Tamghart</h6>
                                                            <p class="text-[16px] mb-[-5px]">Dev & Web</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="swiper-slide">
                                    <div class="flex items-start justify-center">
                                        <div class="pr-[100px] pt-[31px] min-w-[600px]">
                                            <img class="rounded-[50%] w-[40rem]"
                                                src="{{ asset('assets/images/client04.jpg') }}" alt="Monteno">
                                        </div>
                                        <div class="relative">
                                            <h5
                                                class="leading-[3.2] relative mb-[10px]
                                            before::content-[''] before:w-[36px] before:h-[5px] before:absolute before:bottom-0 before:left-0 before:bg-[#fd562a] ">
                                                Testimonial
                                            </h5>
                                            <h3 class="mb-[8px]">What People Say </h3>
                                            <div class="flex items-start justify-center mt-[38px] pl-[7px]">
                                                <img src="assets/images/icon/left-quote.png" alt="Monteno">
                                                <div class="pt-[22px] pl-[24px]">
                                                    <p
                                                        class="text-[21px] italic leading-[1.6] tracking-[-0.2px] mb-[34px]">
                                                        Keniam, quis nostrud exerci ut aliquip ex ea com modo consequat.
                                                        Duis aute irure dolor in reprehen derit in voluptate velit esse
                                                        cillum dolore eu fugiat nulla parinon proident, sunt in culpa</p>
                                                    <div class="flex items-center justify-start">
                                                        <img class="w-14 h-14 rounded-full"
                                                            src="{{ asset('assets/images/client04.jpg') }}"
                                                            alt="Monteno">
                                                        <div class="flex flex-col justify-start pl-4">
                                                            <h6 class="text-orange-500">Mohamed TERQUI</h6>
                                                            <p class="text-[16px] mb-[-5px]">Dev & Web</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section> --}}
    <!-- end Testimonial -->

@endsection
