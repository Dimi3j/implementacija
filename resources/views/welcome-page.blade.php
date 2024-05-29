<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Brainster Next Implementacija</title>
    @vite([ 'resources/css/app.css',
            'resources/css/index.css',
            'resources/css/kalendar.css',
            'resources/css/kopce.css',
            'resources/css/swiper.css',
            'resources/css/swiper2.css',
            'resources/js/app.js',
            'resources/js/index.js',
            'resources/fonts/poppins.css'])

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

    {{-- Kalendarot kade treba da ide --}}
    <section class="calendar-container">
        <div class="calendar-wrapper">
            <div id="calendar"></div>
        </div>
    </section>

    {{-- Kopce --}}

    <div id="overlay" class="overlay"></div>

    <div id="popup" class="popup">
        <span class="close" onclick="closePopUp()">&times;</span>
        <p>This is the popup content.</p>
    </div>

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

        <hr class="line" />

        <div class="end_credits">
            <div class="end_container">
                <span>@ Brainster 2024.Designed with love</span>
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
        function popUp() {
            document.getElementById("overlay").style.display = "block";
            document.getElementById("popup").style.display = "block";
        }

        function closePopUp() {
            document.getElementById("overlay").style.display = "none";
            document.getElementById("popup").style.display = "none";
        }

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
                            className: "fc-event-{{ $event->user_id }}", // the event has a company_id 
                        },
                    @endforeach
                ],
                eventContent: function(arg) {
                    return {
                        html: '<div class="fc-event-container">' + arg.event.title + "</div>",
                    };
                },
                dateClick: function() {
                    popUp();
                },
            });

            function handleDateSelect(args) {}

            function handleDateClick(args) {}
            calendar.render();
        });
    </script>
</body>

</html>
