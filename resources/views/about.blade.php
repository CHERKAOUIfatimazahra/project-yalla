@extends('layout.app')
@section('content')
    <style>
        .swiper-wrapper {
            height: max-content !important;
            width: max-content;
        }

        .swiper-button-next,
        .swiper-button-prev {
            top: 25%;
            z-index: 1000;
        }

        .swiper-button-next {
            right: -0px !important;
        }

        .swiper-button-prev {
            left: 0px !important;
        }

        .swiper-button-prev:after,
        .swiper-rtl .swiper-button-next:after {
            content: "" !important;
        }

        .mySwiper {
            max-width: 320px !important;
            margin: 0 auto !important;
        }

        .swiper-button-next:after,
        .swiper-rtl .swiper-button-prev:after {
            content: "" !important;
        }

        .mySwiper .swiper-slide.swiper-slide-thumb-active>.swiper-slide\:w-16 {
            --tw-scale-x: 1;
            --tw-scale-y: 1;
            transform: translate(var(--tw-translate-x), var(--tw-translate-y)) rotate(var(--tw-rotate)) skewX(var(--tw-skew-x)) skewY(var(--tw-skew-y)) scaleX(var(--tw-scale-x)) scaleY(var(--tw-scale-y));
        }

        .mySwiper .swiper-slide.swiper-slide-thumb-active>.swiper-slide\:border-indigo-600 {
            --tw-border-opacity: 1;
            border-color: rgb(79 70 229 / var(--tw-border-opacity));
        }

        .eventswiper .swiper-wrapper {
            height: max-content !important;
            padding-bottom: 64px !important;
        }

        .eventswiper .swiper-horizontal>.swiper-scrollbar,
        .eventswiper .swiper-scrollbar.swiper-scrollbar-horizontal {
            max-width: 140px !important;
            height: 3px !important;
            bottom: 25px !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
        }

        .eventswiper .swiper-pagination-fraction {
            bottom: 0 !important;
            padding-top: 16px !important;
        }

        .eventswiper .swiper-slide.swiper-slide-active>.slide\:border-indigo-600 {
            --tw-border-opacity: 1;
            border-color: rgb(79 70 229 / var(--tw-border-opacity));
        }

        .eventswiper .swiper-pagination-total {
            color: rgb(156 163 175) !important;
        }

        .eventswiper .swiper-scrollbar-drag {
            background: rgb(79 70 229);
        }

        .eventswiper .swiper-pagination-fraction {
            bottom: 0 !important;
        }

        .eventswiper .swiper-button-prev:after,
        .eventswiper .swiper-rtl .swiper-button-next:after {
            content: '' !important;
        }

        .eventswiper .swiper-button-prev {
            top: 93% !important;
            left: 35% !important;
            z-index: 100 !important;
        }

        .eventswiper .swiper-button-next {
            top: 93% !important;
            right: 35% !important;
            z-index: 100 !important;
        }

        .eventswiper .swiper-button-next:after,
        .eventswiper .swiper-rtl .swiper-button-prev:after {
            content: '' !important;
        }

        .eventswiper .swiper-button-next svg,
        .eventswiper .swiper-button-prev svg {
            width: 24px !important;
            height: 24px !important;
        }
    </style>

    <body class="font-inter">

        <section class="py-14 lg:py-24 relative z-0 bg-gray-50">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative text-center">
                <h1
                    class="max-w-2xl mx-auto text-center font-manrope font-bold text-4xl  text-gray-900 mb-5 md:text-5xl md:leading-normal">
                    Elevate Your Events with Our <span class="text-indigo-600">Smart Solutions "YALLA"</span>
                </h1>
                <p class="max-w-sm mx-auto text-center text-base font-normal leading-7 text-gray-500 mb-9">
                    YALLA propose une solution novatrice sous
                    la forme d'une plateforme intelligente dédiée à la création et à
                    la promotion d'évènements.</p>
            </div>
        </section>

        <section class="py-14 relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative ">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-9">
                    <div class="img-box">
                        <img src="../images/yalla.png" alt="About Us tailwind page" class="max-lg:mx-auto">
                    </div>
                    <div class="lg:pl-[100px] flex items-center">
                        <div class="data w-full">
                            <h2
                                class="font-manrope font-bold text-4xl lg:text-5xl text-black mb-9 max-lg:text-center relative">
                                About
                                Us </h2>
                            <p class="font-normal text-xl leading-8 text-gray-500 max-lg:text-center max-w-2xl mx-auto">
                                YALLA est une plateforme web intelligente qui simplifie la création,
                                la promotion et la gestion d'évènements.
                                Elle offre une interface conviviale aux organisateurs et aux participants,
                                favorisant une expérience transparente du début à la fin du processus événementiel.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="py-14 lg:py-24 relative">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 relative ">
                <div class="grid grid-cols-1 lg:grid-cols-2 lg:gap-9 ">

                    <div class="lg:pr-24 flex items-center">
                        <div class="data w-full">
                            <img src="https://pagedone.io/asset/uploads/1702034785.png" alt="About Us tailwind page"
                                class="block lg:hidden mb-9 mx-auto">
                            <h2 class="font-manrope font-bold text-4xl lg:text-5xl text-black mb-9 max-lg:text-center">We
                                are Creative Since 2024</h2>
                            <p class="font-normal text-xl leading-8 text-gray-500 max-lg:text-center max-w-2xl mx-auto">
                                Dans un paysage où les événements jouent un rôle central dans la société,
                                YALLA intervient pour faciliter la connexion entre les organisateurs et leur public.
                                Que ce soit pour des évènements culturels, sportifs, ou professionnels,
                                YALLA s'adresse à un large éventail d'initiatives.
                            </p>
                        </div>
                    </div>
                    <div class="img-box ">
                        <img src="https://pagedone.io/asset/uploads/1702034785.png" alt="About Us tailwind page"
                            class="hidden lg:block ">
                    </div>
                </div>
            </div>
        </section>

        <section class="py-20 bg-white">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <h2 class="font-manrope text-4xl text-center text-gray-900 font-bold mb-14">Achievements at a Glance</h2>
                <div class="flex flex-col gap-5 xl:gap-8 lg:flex-row lg:justify-between">
                    <div
                        class="w-full max-lg:max-w-2xl mx-auto lg:mx-0 lg:w-1/3 bg-white p-6 rounded-2xl shadow-md shadow-gray-100">
                        <div class="flex gap-5">
                            <div class="font-manrope text-2xl font-bold text-indigo-600">
                                240%
                            </div>
                            <div class="flex-1">
                                <h4 class="text-xl text-gray-900 font-semibold mb-2">Event Growth</h4>
                                <p class="text-xs text-gray-500 leading-5">Experience remarkable growth in your events as we
                                    continually innovate and drive towards new heights of success.</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full max-lg:max-w-2xl mx-auto lg:mx-0 lg:w-1/3 bg-white p-6 rounded-2xl shadow-md shadow-gray-100">
                        <div class="flex gap-5">
                            <div class="font-manrope text-2xl font-bold text-indigo-600">
                                175+
                            </div>
                            <div class="flex-1">
                                <h4 class="text-xl text-gray-900 font-semibold mb-2">Satisfied Clients</h4>
                                <p class="text-xs text-gray-500 leading-5">Our dedicated team ensures client satisfaction at
                                    every step, making your event planning journey smooth and rewarding.</p>
                            </div>
                        </div>
                    </div>
                    <div
                        class="w-full max-lg:max-w-2xl mx-auto lg:mx-0 lg:w-1/3 bg-white p-6 rounded-2xl shadow-md shadow-gray-100">
                        <div class="flex gap-5">
                            <div class="font-manrope text-2xl font-bold text-indigo-600">
                                625+
                            </div>
                            <div class="flex-1">
                                <h4 class="text-xl text-gray-900 font-semibold mb-2">Successful Events</h4>
                                <p class="text-xs text-gray-500 leading-5">We've organized over 625 successful events
                                    worldwide, and we're committed to making yours the next big success story.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
            <div class="mb-24">
                <h2 class="font-manrope text-4xl text-center font-bold text-gray-900 mb-6">Meet Our Event Experts</h2>
                <p class="text-lg text-gray-500 text-center">We provide all the tools and support needed to simplify event
                    planning and execution.</p>
            </div>
        </div>

        <div class="bg-[#F2F4FF] h-screen">
            <section class="max-w-5xl mx-auto py-10 sm:py-20">
                <div class="flex items-center justify-center flex-col gap-y-2 py-5">
                    <h2 class="text-2xl md:text-3xl lg:text-4xl font-bold">Frequently asked questions</h2>
                    <p class="text-lg font-medium text-slate-700/70">Questions related to event management</p>
                </div>
                <div class="w-full px-7 md:px-10 xl:px-2 py-4">
                    <div class="mx-auto w-full max-w-5xl border border-slate-400/20 rounded-lg bg-white">
                        <div class="border-b border-[#0A071B]/10">
                            <button
                                class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-slate-800 focus:outline-none p-5"
                                data-toggle="answer-1"><span>What types of events can be organized using your
                                    platform?</span><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                    viewBox="0 0 24 24"
                                    class=" mt-1.5 md:mt-0 flex-shrink-0 rotate-180 transform h-5 w-5 text-[#5B5675]"
                                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z">
                                    </path>
                                </svg></button>
                            <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-[#343E3A] font-medium"
                                id="answer-1" style="display: none;">Our platform supports a wide range of events including
                                conferences, seminars, workshops, festivals, concerts, and more.</div>
                        </div>
                        <div class="border-b border-[#0A071B]/10">
                            <button
                                class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-slate-800 focus:outline-none p-5"
                                data-toggle="answer-2"><span>What features do you offer for event promotion and
                                    marketing?</span><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                    viewBox="0 0 24 24" class=" mt-1.5 md:mt-0 flex-shrink-0  h-5 w-5 text-[#5B5675]"
                                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z">
                                    </path>
                                </svg></button>
                            <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-[#343E3A] font-medium"
                                id="answer-2" style="display: none;">We provide robust features for event promotion such as
                                social media integration, email campaigns, customizable event pages, and analytics tools to
                                track engagement.</div>
                        </div>
                        <div class="border-b border-[#0A071B]/10">
                            <button
                                class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-slate-800 focus:outline-none p-5"
                                data-toggle="answer-3"><span>Is there a limit to the number of attendees for an
                                    event?</span><svg stroke="currentColor" fill="currentColor" stroke-width="0"
                                    viewBox="0 0 24 24" class=" mt-1.5 md:mt-0 flex-shrink-0  h-5 w-5 text-[#5B5675]"
                                    height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z">
                                    </path>
                                </svg></button>
                            <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-[#343E3A] font-medium"
                                id="answer-3" style="display: none;">No, our platform can accommodate events of any size,
                                from small gatherings to large-scale conferences.</div>
                        </div>
                        <div class="">
                            <button
                                class="question-btn flex w-full items-start gap-x-5 justify-between rounded-lg text-left text-lg font-bold text-slate-800 focus:outline-none p-5"
                                data-toggle="answer-4"><span>Do you provide post-event analytics and reports?</span><svg
                                    stroke="currentColor" fill="currentColor" stroke-width="0" viewBox="0 0 24 24"
                                    class=" mt-1.5 md:mt-0 flex-shrink-0  h-5 w-5 text-[#5B5675]" height="1em"
                                    width="1em" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M16.293 9.293 12 13.586 7.707 9.293l-1.414 1.414L12 16.414l5.707-5.707z">
                                    </path>
                                </svg></button>
                            <div class="answer pt-2 pb-5 px-5 text-sm lg:text-base text-[#343E3A] font-medium"
                                id="answer-4" style="display: none;">Yes, we provide comprehensive analytics and reports
                                post-event, including attendance metrics, audience engagement data, and feedback analysis.
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>


        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const buttons = document.querySelectorAll('.question-btn');

                buttons.forEach(button => {
                    button.addEventListener('click', function() {
                        const targetId = this.getAttribute('data-toggle');
                        const target = document.getElementById(targetId);
                        const isExpanded = target.style.display === 'block';

                        if (isExpanded) {
                            target.style.display = 'none';
                            this.querySelector('svg').classList.remove('rotate-180');
                        } else {
                            target.style.display = 'block';
                            this.querySelector('svg').classList.add('rotate-180');
                        }
                    });
                });
            });
        </script>
    </body>
@endsection
