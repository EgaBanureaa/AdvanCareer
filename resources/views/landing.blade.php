@extends('layout')
@section('content')

<section id="home" class="bg-white dark:bg-gray-900">
    <div class="pt-20 pb-8 px-4 mx-auto max-w-screen-xl">
        <div id="landing-carousel" class="relative w-full" data-carousel="slide">
            <!-- Carousel wrapper -->
            <div class="relative h-56 overflow-hidden rounded-lg md:h-[27rem]">
                @foreach ($slides as $slide)
                    <div id="carousel-item-{{ $loop->iteration }}" class="hidden duration-1000 ease-in-out" data-carousel-item>
                        <img src="{{ asset('storage/'.$slide->image) }}" class="absolute block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
                    </div>
                @endforeach
            </div>
            <!-- Slider indicators -->
            <div class="absolute z-30 flex -translate-x-1/2 bottom-5 left-1/2 space-x-3 rtl:space-x-reverse">
                @foreach ($slides as $slide)
                    <button id="carousel-indicator-{{ $loop->iteration }}" type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="{{ $loop->iteration - 1 }}"></button>
                @endforeach
            </div>
            <!-- Slider controls -->
            <button type="button" class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 1 1 5l4 4"/>
                    </svg>
                    <span class="sr-only">Previous</span>
                </span>
            </button>
            <button type="button" class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
                <span class="inline-flex items-center justify-center w-10 h-10 rounded-full bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
                    <svg class="w-4 h-4 text-white dark:text-gray-800 rtl:rotate-180" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <span class="sr-only">Next</span>
                </span>
            </button>
        </div>
    </div>

</section>

<section id="jobs" class="bg-white dark:bg-gray-900">
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16">
        <h2 class="mb-8 text-3xl font-extrabold tracking-tight leading-tight text-center text-gray-900 lg:mb-16 dark:text-white md:text-4xl"><br>Available Jobs For You!</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 lg:grid-cols-4 gap-4">
            @foreach ($lokers as $loker)
            <div class="max-w-md bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 flex flex-col">
                <a href="{{ route('job_detail', $loker->id) }}">
                    <img class="rounded-t-lg h-56" src="{{ asset('/storage/' . $loker->thumbnail) }}" alt="" />
                </a>
                <div class="p-5 flex-grow">
                    <a href="{{ route('job_detail', $loker->id) }}">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $loker->name }}</h5>
                    </a>
                </div>

                <a href="{{ route('job_detail', $loker->id) }}" class="ms-5 w-32 mb-4 inline-flex items-center px-3 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                    Read more
                     <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9"/>
                    </svg>
                </a>
            </div>
            
            @endforeach

        </div>
    </div>
</section>

@endsection

@section('custom_script')
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            const carouselElement = document.getElementById('landing-carousel');

            const items = [
                @foreach ($slides as $slides)
                {
                    position: {{ $loop->iteration -1 }},
                    el: document.getElementById('carousel-item-{{ $loop->iteration }}'),
                },
                @endforeach
            ];

            // options with default values
            const options = {
                defaultPosition: 0,
                interval: 5000,

                indicators: {
                    activeClasses: 'bg-white dark:bg-gray-800',
                    inactiveClasses:
                        'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
                    items: [
                        @foreach ($slides as $slides)
                        {
                            position: {{ $loop->iteration -1 }},
                            el: document.getElementById('carousel-indicator-{{ $loop->iteration }}'),
                        },
                        @endforeach
                    ],
                },
            };

            // instance options object
            const instanceOptions = {
                id: 'landing-carousel',
                override: true
            };

            const carousel = new Carousel(carouselElement, items, options, instanceOptions);
            console.log(carousel);
        });
    </script>
@endsection