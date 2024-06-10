<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brainster Next Implementacija</title>
    @vite(['resources/css/app.css', 'resources/css/fillter.css', 'resources/css/index.css', 'resources/css/kalendar.css', 'resources/css/kopce.css', 'resources/css/swiper.css', 'resources/css/swiper2.css', 'resources/js/app.js', 'resources/js/index.js', 'resources/css/popup1.css', 'resources/fonts/poppins.css'])

    {{-- Swiper --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

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
                        <a href="{{ url('/dashboard') }}" class="log_btn">Dash</a>
                    @else
                        <button class="log_btn" onclick="window.location='{{ route('login') }}'">Логирај се</button>

                        @if (Route::has('register'))
                            <button class="reg_btn"
                                onclick="window.location='{{ route('register') }}'">Регистрација</button>
                        @endif
                    @endauth
                @endif

                <div class="dropdown">
                    <button>
                        <img src="{{ Vite::asset('resources/images/material-symbols-light_language.png') }}"
                            alt="Image 1">
                    </button>
                    <div class="dropdown-content">
                        <a href="#">Англиски</a>
                        <a href="#">Македонски</a>
                    </div>
                </div>
            </div>

        </div>
    </nav>

    {{-- Hero --}}
    <section id="Hero">
        <div class="swiper-container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    @foreach ($events as $event)
                        <div class="swiper-slide" style="background-image: url('{{ $event->image_url }}');">
                            <div class="mini-container">
                                <div class="hero-continer">
                                    <div class="hero-details">
                                        <p class="Hero-text">{{ $event->title }}</p>
                                        <div class="hero-time">
                                            <p>{{ \Carbon\Carbon::parse($event->from)->format('d.m.Y') }}</p>
                                            <p>{{ \Carbon\Carbon::parse($event->from)->format('H:i') }}h</p>
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

    {{-- Hero del 2, Toj so kartickite --}}
    <section id="Hero2">
        <div class="swiper-container2">
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper swiper-wrapper2">
                    @foreach ($events as $event)
                        <div class="swiper-slide swiper-slide2" onclick="mitre({{ $loop->index }})">
                            <div class="custom-shape" style="background-image: url('{{ $event->image_url }}');">
                                <div class="little_card">
                                    <h1>{{ $event->title }}</h1>
                                    <div class="little_info">
                                        <p>{{ \Carbon\Carbon::parse($event->from)->format('d.m.Y') }}</p>
                                        <p>{{ \Carbon\Carbon::parse($event->from)->format('H:i') }}h</p>
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
            <h1>Каде одиме вечер?</h1>
            <img src="{{ Vite::asset('resources/images/krugcinja/vecer.png') }}" alt="">

        </div>
    </div>

    {{-- <div class="filter-wrapper">
        <div class="filter-container">
            <div class="splitter">
                <button class="sve">Сите настани</button>
                <div class="dropdown">
                    <button class="dropbtn">Град</button>
                    <div class="dropdown-content">
                        @foreach ($cities as $city)
                            <a href="#">{{ $city->name }}</a>
                        @endforeach
                    </div>
                </div>
                <div class="dropdown">
                    <button class="dropbtn">Локал?</button>
                    <div class="dropdown-content">
                        <a href="#">Venue 1</a>
                        <a href="#">Venue 2</a>
                        <a href="#">Venue 3</a>
                    </div>
                </div>
                <button class="filter-button">BRAINSTER</button>
                <button class="filter-button">МОБ</button>
                <button class="filter-button">Лабораториум</button>
            </div>
            <div>
                <input type="text" class="search-input" placeholder="search">
            </div>
        </div>
    </div> --}}

    <div class="filter-wrapper">
        <div class="filter-container">
            <div class="splitter">
                <button class="sve">Сите настани</button>
                <div class="dropdown">
                    <button class="dropbtn">Град</button>
                    <div class="dropdown-content">
                        @foreach ($cities as $city)
                            <a href="#">{{ $city->name }}</a>
                        @endforeach
                    </div>
                </div>
                @foreach ($premiumCompanies as $company)
                    <a href="?filter={{ $company->company_name }}" class="filter-button">{{ $company->company_name }}</a>
                @endforeach
            </div>
            <div>
                <input type="text" class="search-input" placeholder="search">
            </div>
        </div>
    </div>

    {{-- Kalendarot kade treba da ide --}}
    <section class="calendar-container">
        <div class="calendar-wrapper">
            <div id="calendar"></div>
        </div>
    </section>

    {{-- Kopce --}}

    {{-- KOPCE-1 --}}

    <div id="overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-10" onclick="closePopUp()"></div>

   <div id="cel-Popup1">
        <div id="popup">
            <div class="full-container">
                <div class="scrollable-content">
                    <div class="event-card"  style="background-color: #E5A648;">
                        <img src="https://via.placeholder.com/379x88" alt="Event Image">
                        <div class="items-card">
                            <div class="left-items-card">
                                <p>22:30</p>
                                <p>150ден</p>
                                <p>+38970126456</p>
                            </div>
                            <div class="right-items-card">
                                <p>Toni Zen @Laboratorium</p>
                                <p>Скопје</p>
                                <p>-50% drinks</p>
                            </div>
                        </div>
                    </div>
                    <div class="event-card">
                        <img src="https://via.placeholder.com/379x88" alt="Event Image">
                        <div class="items-card">
                            <div class="left-items-card">
                                <p>23:00</p>
                                <p>200ден</p>
                                <p>+38970126456</p>
                            </div>
                            <div class="right-items-card">
                                <p>Another Event @place</p>
                                <p>Скопје</p>
                                <p>-30% drinks</p>
                            </div>
                        </div>
                    </div>
                    <div class="event-card">
                        <img src="https://via.placeholder.com/379x88" alt="Event Image">
                        <div class="items-card">
                            <div class="left-items-card">
                                <p>22:30</p>
                                <p>250ден</p>
                                <p>+38970126456</p>
                            </div>
                            <div class="right-items-card">
                                <p>Party @place</p>
                                <p>Скопје</p>
                                <p>-20% on Jack Daniels</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
   </div>


    {{-- KOPCE-2 - DA SE DOPRAI TREBA --}}

{{--
    <div id="popup" class="popup fixed inset-0 flex items-center justify-center z-20">
        <div class="bg-white rounded-lg shadow-lg relative">
            <span class="close absolute top-10 right-10 text-gray-600 cursor-pointer text-xl"
                onclick="closePopUp()">X</span>
            <div>
                <img id="picture" src="{{ Vite::asset('resources/images/pic1.png') }}" alt="Image Toni Zen">
                <div id="mid-popup" class="flex flex-col items-center bg-[#121212] h-[270px]">
                    <span class="text-white text-xl p-5">{{ $event->title }} {{ $event->location }}</span>
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
                                class="text-white flex">{{ \Carbon\Carbon::parse($event->from)->format('H:i') }}</span>
                            <span class="text-white flex">{{ $event->location }}</span>
                            <span class="text-white flex">{{ $event->ticket_price }} ден</span>
                            <span class="text-white flex">{{ $event->contact }}</span>
                            <span class="text-white flex">{{ $event->comment }}</span>
                            <span class="text-white flex">{{ $event->ticket_url }}</span>
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

             function popUp() {
                //da proverite dali da se pokaze modal ili ne
                // vo modalot da se namestat samo eventite od izbraniot den

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
                    <a class="end_credits_A" href="#">Privacy policy</a></span>
            </div>
        </div>
    </footer>


    <script>
        // Scripts for swiper
        var swiper = new Swiper(".mySwiper", {
            autoplay: {
                delay: 2500,
                disableOnInteraction: false,
            },
            preventClicks: false,
            preventClicksPropagation: false,
        });

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

        // Scripts for calendar
        // function popUp() {
        //     document.getElementById("overlay").style.display = "block";
        //     document.getElementById("popup").style.display = "block";
        // }

        // function closePopUp() {
        //     document.getElementById("overlay").style.display = "none";
        //     document.getElementById("popup").style.display = "none";
        // }

        document.addEventListener("DOMContentLoaded", function() {
            var calendarEl = document.getElementById("calendar");
            var calendar = new FullCalendar.Calendar(calendarEl, {
                initialView: "dayGridMonth",
                firstDay: 1,
                weekNumberCalculation: "ISO",
                timeZone: "Europe/Skopje",
                height: "auto",
                themeSystem: "bootstrap",
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
                            title: "{{ $event->title }}",
                            start: "{{ $event->from }}",
                            className: "fc-event-{{ $event->company_id }}",
                        },
                    @endforeach
                ],
                eventContent: function(arg) {
                    return {
                        html: '<div class="fc-event-container">' + arg.event.title + "</div>",
                    };
                },
                dateClick: function() {
                    ////
                    ///

                        popUp();

                },
            });

            function handleDateSelect(args) {}

            function handleDateClick(args) {
                popUp();
            }
            calendar.render();
        });
    </script>
</body>

</html>
