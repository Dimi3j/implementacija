<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Next Events</title>
    @vite(['resources/css/app.css', 'resources/css/fillter.css', 'resources/css/index.css', 'resources/css/kalendar.css', 'resources/css/kopce.css', 'resources/css/swiper.css', 'resources/css/swiper2.css', 'resources/js/app.js', 'resources/js/index.js', 'resources/css/popup1.css', 'resources/fonts/poppins.css'])

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    {{-- FontAwesome --}}
    <script src="https://kit.fontawesome.com/c406aee417.js" crossorigin="anonymous"></script>

    {{-- Fullcalendar --}}
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js"></script>

</head>

<body>

    {{-- Navbar --}}

    <nav class="main_nav">
        <div class="nav_container">
            <div class="logo">
                <img src="{{ Vite::asset('resources/images/brainster-learn-logo 2.png') }}" alt="Image 1">
            </div>

            <div class="nav_links">
                @if (Route::has('login'))
                    @auth
                        <a href="{{ url('/dashboard') }}" class="log_btn">{{ __('Панел') }}</a>
                    @else
                        <button class="log_btn"
                            onclick="window.location='{{ route('login') }}'">{{ __('Логирај се') }}</button>

                        @if (Route::has('register'))
                            <button class="reg_btn"
                                onclick="window.location='{{ route('register') }}'">{{ __('Регистрација') }}</button>
                        @endif
                    @endauth
                @endif

                <div class="dropdown">
                    <button>
                        <img src="{{ Vite::asset('resources/images/material-symbols-light_language.png') }}"
                            alt="Image 1">
                    </button>
                    <div class="dropdown-content">
                        {{-- <a href="#">{{ __('Англиски')}}</a>
                        <a href="#">{{ __('Македонски')}}</a> --}}
                        <a href="#">{{ __('Наскоро...') }}</a>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    {{-- Swiper/Hero --}}

    <section id="Hero">
        <div class="swiper-container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($swipers->sortBy('from')->take(5) as $swipe)
                        <div class="swiper-slide" style="background-image: url('{{ $swipe->image_url }}');">
                            <div class="mini-container">
                                <div class="hero-container">
                                    <div class="hero-details">
                                        <p class="Hero-text">{{ $swipe->title }}</p>
                                        <div class="hero-time">
                                            <p>{{ \Carbon\Carbon::parse($swipe->from)->format('d.m.Y') }}</p>
                                            <p>{{ \Carbon\Carbon::parse($swipe->from)->format('H:i') }}h</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Swiper 2/Hero 2 --}}

    <section id="Hero2">
        <div class="swiper-container2">
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper swiper-wrapper2">
                    @foreach ($swipers->sortBy('from')->take(5) as $swipe)
                        <div class="swiper-slide swiper-slide2" onclick="mitre({{ $loop->index }})">
                            <div class="custom-shape" style="background-image: url('{{ $swipe->image_url }}');">
                                <div class="little_card">
                                    <h1>{{ $swipe->title }}</h1>
                                    <div class="little_info">
                                        <p>{{ \Carbon\Carbon::parse($swipe->from)->format('d.m.Y') }}</p>
                                        <p>{{ \Carbon\Carbon::parse($swipe->from)->format('H:i') }}h</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Skriptite za da rabotat swipers --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <div class="vecer">
        <div class="vecer_container">
            <h1>{{ __('Каде одиме вечер?') }}</h1>
            <img src="{{ Vite::asset('resources/images/krugcinja/vecer.png') }}" alt="">

        </div>
    </div>

    {{-- Fillteri --}}

    <div class="filter-wrapper">
        <div class="filter-container">
            <div class="splitter">
                <a href="?filter=all" class="sve">{{ __('Сите настани') }} <i
                        class="fa-solid fa-arrow-down-long"></i></a>
                <div class="dropdown">
                    <button class="dropbtn">{{ __('Град') }}<i class="fa-solid fa-arrow-down-long"></i></button>
                    <div class="dropdown-content">
                        @foreach ($cities as $city)
                            <a
                                href="?city={{ $city->id }}&{{ http_build_query(request()->except('city')) }}">{{ $city->name }}</a>
                        @endforeach
                    </div>
                </div>
                @foreach ($premiumCompanies as $company)
                    <a href="?filter={{ $company->id }}&{{ http_build_query(request()->except('filter')) }}"
                        class="filter-button">{{ $company->company_name }}</a>
                @endforeach
            </div>
            <div class="search-container">
                <form method="GET" action="{{ url()->current() }}" class="search-form">
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <input type="text" name="search" class="search-input" placeholder="search"
                        value="{{ request('search') }}">
                    <button type="submit" style="display: none;">{{ __('Пребарување') }}</button>

                    @if (request('filter') && request('filter') != 'all')
                        <input type="hidden" name="filter" value="{{ request('filter') }}">
                    @endif
                    @if (request('city'))
                        <input type="hidden" name="city" value="{{ request('city') }}">
                    @endif
                </form>
            </div>
        </div>
    </div>


    {{-- Kalendarot kade treba da ide --}}

    <section class="calendar-container">
        <div class="calendar-wrapper">
            <div id="calendar"></div>
        </div>
    </section>

    {{-- Popup 1 all events --}}

    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-10" onclick="closePopUp()"></div>

    <div id="cel-Popup1">
        <div id="popup">
            <div class="full-container">
                <div class="scrollable-content" id="event-modal">
                    {{-- <div class="event-card" style="background-color: #E5A648;">
                        <img src="{{ $swipe->image_url }}" alt="Event Image">
                        <div class="items-card">
                            <div class="left-items-card">
                                <p>{{ \Carbon\Carbon::parse($swipe->from)->format('H:i') }}</p>
                                <p>{{ $swipe->ticket_price }}</p>
                                <p>{{ $swipe->contact }}</p>
                            </div>
                            <div class="right-items-card">
                                <p>{{ $swipe->title }}</p>
                                <p>{{ $cities->get($swipe->city_id)->name }}</p>
                                <p>{{ $swipe->comment }}</p>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>


    {{-- KOPCE-2 - DA SE DOPRAI TREBA --}}

    {{-- <div id="popup" class="popup fixed inset-0 flex items-center justify-center z-20">
        <div class="bg-white rounded-lg shadow-lg relative">
            <span class="close absolute top-10 right-10 text-gray-600 cursor-pointer text-xl"
                onclick="closePopUp()">X</span>
            <div>
                <img id="picture" src="{{ Vite::asset('resources/images/pic1.png') }}" alt="Image Toni Zen">
                <div id="mid-popup" class="flex flex-col items-center bg-[#121212] h-[270px]">
                    <span class="text-white text-xl p-5">{{ $swipe->title }} {{ $swipe->location }}</span>
                    <div class="flex gap-2">
                        <div>
                            <span class="text-white flex">Време: </span>
                            <span class="text-white flex">Место: </span>
                            <span class="text-white flex">Цена: </span>
                            <span class="text-white flex">Контакт: </span>
                            <span class="text-white flex">Промоција: </span>
                            <span class="text-white flex">Линк до карти: </span>
                        </div>
                        <div>
                            <span
                                class="text-white flex">{{ \Carbon\Carbon::parse($swipe->from)->format('H:i') }}</span>
                            <span class="text-white flex">{{ $swipe->location }}</span>
                            <span class="text-white flex">{{ $swipe->ticket_price }} ден</span>
                            <span class="text-white flex">{{ $swipe->contact }}</span>
                            <span class="text-white flex">{{ $swipe->comment }}</span>
                            <span class="text-white flex">{{ $swipe->ticket_url }}</span>
                        </div>
                    </div>
                </div>

                <div id="location">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2965.208370871187!2d21.489269186523444!3d41.995803443803865!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13543f007e5ba151%3A0x7b55ead34c3a9378!2sKozara%20dooel!5e0!3m2!1sen!2smk!4v1717097913831!5m2!1sen!2smk"
                        width="871" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>

            </div>
        </div>
    </div> --}}



    {{-- SCRIPT FOR POPUP --}}

    <script>
        var events = JSON.parse('{!! $events->toJson() !!}');

        function popUp(selectedDate) {

            const realDate = new Date(selectedDate)

            // Extract the year, month, and day from the selected date
            const selectedYear = realDate.getFullYear();
            const selectedMonth = realDate.getMonth();
            const selectedDay = realDate.getDate();

            document.querySelector("#event-modal").innerHTML = '';

            events.forEach(event => {
                // Extract year, month, and day from the event date
                const eventDate = new Date(event.from);
                const eventYear = eventDate.getFullYear();
                const eventMonth = eventDate.getMonth();
                const eventDay = eventDate.getDate();

                // Check if the year, month, and day match
                const isSameDay = (eventYear === selectedYear) && (eventMonth === selectedMonth) && (eventDay ===
                    selectedDay);

                if (isSameDay) {

                    let backgroundColor;

                    if (event.company_id == 1) {
                        backgroundColor = "#c9cc2c";
                    } else if (event.company_id == 2) {
                        backgroundColor = "#f54646";
                    } else if (event.company_id == 3) {
                        backgroundColor = "#e5a648";
                    } else {
                        backgroundColor = "#8448E5";
                    };

                    document.querySelector("#event-modal").innerHTML +=
                        `<div class="event-card" style="background-color: ${backgroundColor};">
                        <img src="${event.image_url}" alt="Event Image">
                        <div class="items-card">
                            <div class="left-items-card">
                                <p>${event.from}</p>
                                <p>${event.ticket_price ? event.ticket_price : 'Free'}</p>
                                <p>${event.contact}</p>
                            </div>
                            <div class="right-items-card">
                                <p>${event.title}</p>
                                <p>{{ $cities->get($swipe->city_id)->name }}</p>
                                <p>${event.comment}</p>
                            </div>
                        </div>
                    </div>`;
                }
            });

            document.getElementById("overlay").style.display = "block";
            document.getElementById("popup").style.display = "block";
        }

        function closePopUp() {
            document.getElementById("overlay").style.display = "none";
            document.getElementById("popup").style.display = "none";
        }
    </script>

    {{-- Footer --}}
    <footer>
        <div class="first_part">
            <div class="footer_container">
                <div class="left_circle">
                    <img src="{{ Vite::asset('resources/images/krugcinja/footer_left.png') }}" alt="">

                </div>

                <div class="media_logos">
                    <img src="{{ Vite::asset('resources/images/brainster-learn-logo 2.png') }}" alt="">


                    <div class="logos">
                        <a href="https://www.facebook.com/brainster.co/">
                            <img src="{{ Vite::asset('resources/images/logos_facebook.png') }}" alt="">

                        </a>

                        <a href="https://www.instagram.com/brainsterco/">
                            <img src="{{ Vite::asset('resources/images/Group.png') }}" alt="">
                        </a>

                        <a href="https://www.linkedin.com/school/brainster-co/?originalSubdomain=mk">
                            <img src="{{ Vite::asset('resources/images/devicon_linkedin.png') }}" alt="">

                        </a>
                        <a href="https://www.tiktok.com/@brainsterco">
                            <img src="{{ Vite::asset('resources/images/logos_tiktok-icon.png') }}" alt="">

                        </a>
                        <a href="https://www.youtube.com/channel/UCNtVHccQMoj5VV8HM1jv_uw">
                            <img src="{{ Vite::asset('resources/images/logos_youtube-icon.png') }}" alt="">

                        </a>
                    </div>
                </div>

                <div class="right_circle">
                    <img src="{{ Vite::asset('resources/images/krugcinja/footer_right.png') }}" alt="">

                </div>
            </div>
        </div>

        <div class="cvetan_e_retard">
            <hr class="line" />
        </div>

        <div class="end_credits">
            <div class="end_container">
                <span>@ Brainster 2024. Designed with love</span>
                <span>Do you like to read long legal texts?
                    <a class="end_credits_A" href="#">Privacy policy</a>
                </span>
            </div>
        </div>
    </footer>


    <script>
        // Scripts for big swiper
        var swiper = new Swiper(".mySwiper", {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            preventClicks: false,
            preventClicksPropagation: false,
        });

        // Scripts for small swiper
        var swiper2 = new Swiper(".mySwiper2", {
            slidesPerView: "auto",
            spaceBetween: 50,
            freeMode: true,
            autoplay: false,
            grabCursor: true,
        });

        function mitre(id) {
            swiper.slideTo(id);
        }

        // Calendar instance
        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: "dayGridMonth",
                firstDay: 1,
                weekNumberCalculation: "ISO",
                timeZone: "Europe/Skopje",
                height: "auto",
                themeSystem: "bootstrap",
                // nextDayThreshold: '23:00:00',
                slotDuration: {
                    days: 1
                },
                select: handleDateSelect.bind(this),
                eventClick: handleDateClick.bind(this),
                eventTimeFormat: {
                    hour: "2-digit",
                    minute: "2-digit",
                    hour12: false,
                },
                dayHeaderContent: (args) => {
                    const dayNames = [
                        "НЕДЕЛА",
                        "ПОНЕДЕЛНИК",
                        "ВТОРНИК",
                        "СРЕДА",
                        "ЧЕТВРТОК",
                        "ПЕТОК",
                        "САБОТА",
                    ];
                    const dayName = dayNames[args.date.getUTCDay()];
                    return dayName;
                },
                headerToolbar: {
                    left: "prev",
                    center: "title",
                    right: "next",
                },
                events: [
                    @foreach ($events as $event)
                        {
                            id: "{{ $event->id }}",
                            title: "{{ $event->title }}",
                            start: "{{ $event->from }}",
                            // end: "{{ $event->to }}",
                            className: @if ($event->company_id == 1)
                                "fc-event-brainster"
                            @elseif ($event->company_id == 2)
                                "fc-event-mob"
                            @elseif ($event->company_id == 3)
                                "fc-event-laboratorium"
                            @else
                                "fc-event-default"
                            @endif ,
                        },
                    @endforeach
                ],

                eventContent: function(arg) {
                    return {
                        html: '<div class="fc-event-container">' + arg.event.title + "</div>",
                    };
                },
                dateClick: function(info) {
                    popUp(info.date);
                }
            });

            function handleDateSelect(args) {}

            function handleDateClick(args) {
                /* id da passnese */
                console.log("naj i jak")
            }
            calendar.render();
        });
    </script>
</body>
</html>
