<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
    <link rel="stylesheet" href="{{ asset('css/swiper.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kalendar.css') }}">
    <link rel="stylesheet" href="{{ asset('css/kopce.css') }}">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.13/index.global.min.js"></script>

    <script>
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
                    {
                        title: "Brainster Event",
                        start: "2024-05-26T20:00:00",
                        className: "fc-event-brainster",
                    },
                    {
                        title: "MOB Event",
                        start: "2024-05-26T22:00:00",
                        className: "fc-event-mob",
                    },
                    {
                        title: "MOB Event",
                        start: "2024-05-26T22:00:00",
                        className: "fc-event-mob",
                    },
                    {
                        title: "MOB Event",
                        start: "2024-05-26T22:00:00",
                        className: "fc-event-mob",
                    },
                    {
                        title: "MOB Event",
                        start: "2024-05-26T22:00:00",
                        className: "fc-event-mob",
                    },
                    {
                        title: "MOB Event",
                        start: "2024-05-26T22:00:00",
                        className: "fc-event-mob",
                    },
                    {
                        title: "MOB Event",
                        start: "2024-05-26T22:00:00",
                        className: "fc-event-mob",
                    }
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
</head>

<body>
    {{-- Navbar --}}
    <nav class="main_nav">
        <div class="nav_container">
            <div class="logo">
                <img src="{{ asset('./images/brainster-learn-logo 2.png') }}" alt="Image 1">
            </div>

            <div class="nav_links">
                <button class="log_btn">Логирај се</button>

                <button class="reg_btn">Регистрација</button>

                <div class="dropdown">
                    <button>
                        <img src="{{ asset('./images/material-symbols-light_language.png') }}" alt="Image 1">

                    </button>
                    <div class="dropdown-content">
                        <a href="#">Англиски</a> {{-- find a package that translates to english --}}
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
                    @foreach($events as $event)
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
                    @foreach($events as $event)
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
            <img src="{{ asset('./images/krugcinja/vecer.png') }}" alt="">

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
                    <img src="{{ asset('./images/krugcinja/footer_left.png') }}" alt="">

                </div>

                <div class="media_logos">
                    <img src="{{ asset('./images/brainster-learn-logo 2.png') }}" alt="">


                    <div class="logos">
                        <a href="https://www.facebook.com/brainster.co/">
                            <img src="{{ asset('./images/logos_facebook.png') }}" alt="">

                        </a>

                        <a href="https://www.instagram.com/brainsterco/">
                            <img src="{{ asset('./images/Group.png') }}" alt="">
                        </a>

                        <a href="https://www.linkedin.com/school/brainster-co/?originalSubdomain=mk">
                            <img src="{{ asset('./images/devicon_linkedin.png') }}" alt="">

                        </a>
                        <a href="https://www.tiktok.com/@brainsterco">
                            <img src="{{ asset('./images/logos_tiktok-icon.png') }}" alt="">

                        </a>
                        <a href="https://www.youtube.com/channel/UCNtVHccQMoj5VV8HM1jv_uw">
                            <img src="{{ asset('./images/logos_youtube-icon.png') }}" alt="">

                        </a>
                    </div>
                </div>

                <div class="right_circle">
                    <img src="{{ asset('./images/krugcinja/footer_right.png') }}" alt="">

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

    {{-- Skriptite za da rabotat swipers --}}
    <script>
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
    </script>

    <script src="{{ asset('./js/index.js') }}"></script>
</body>

</html>
