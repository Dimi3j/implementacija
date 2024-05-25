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
    <!-- Navbar -->
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
                        <a href="#">Англиски</a> <!-- find a package that translates to english -->
                        <a href="#">Македонски</a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <!-- Hero -->
    <section id="Hero">
        <div class="swiper-container">
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">

                    <!-- Vo swiper slide ke treba slikata od baza da se zeme -->
                    <!-- I da se dodade vo style da se dodade slikata background-image: url(./assets/pic1.png); primer kako bi licelo -->
                    <div class="swiper-slide">
                        <div class="mini-container">
                            <div class="hero-continer">
                                <div class="hero-details">
                                    <!-- get the tittle from database -->
                                    <p class="Hero-text">Biggest brainster Party1</p>

                                    <div class="hero-time">
                                        <!-- get the date and time from the database -->
                                        <p>01.03.2024</p>
                                        <p>20:00h</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide" style="background-image: url('{{ asset('images/pic1.png') }}')">
                        <div class="mini-container">
                            <div class="hero-continer">
                                <div class="hero-details">
                                    <!-- Ovde ke treba od baza da se zeme Title-ot -->
                                    <p class="Hero-text">Biggest brainster Party 2</p>

                                    <div class="hero-time">
                                        <!-- Ovde ke treba od baza da se zemat datumot i saatot -->
                                        <p>01.03.2024</p>
                                        <p>20:00h</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="mini-container">
                            <div class="hero-continer">
                                <div class="hero-details">
                                    <!-- Ovde ke treba od baza da se zeme Title-ot -->
                                    <p class="Hero-text">Biggest brainster Party3</p>

                                    <div class="hero-time">
                                        <!-- Ovde ke treba od baza da se zemat datumot i saatot -->
                                        <p>01.03.2024</p>
                                        <p>20:00h</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide" style="background-image: url('{{ asset('images/pic2.png') }}')">
                        <div class="mini-container">
                            <div class="hero-continer">
                                <div class="hero-details">
                                    <!-- Ovde ke treba od baza da se zeme Title-ot -->
                                    <p class="Hero-text">Biggest brainster Party 4</p>

                                    <div class="hero-time">
                                        <!-- Ovde ke treba od baza da se zemat datumot i saatot -->
                                        <p>01.03.2024</p>
                                        <p>20:00h</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide">
                        <div class="mini-container">
                            <div class="hero-continer">
                                <div class="hero-details">
                                    <!-- Ovde ke treba od baza da se zeme Title-ot -->
                                    <p class="Hero-text">Biggest brainster Party5</p>

                                    <div class="hero-time">
                                        <!-- Ovde ke treba od baza da se zemat datumot i saatot -->
                                        <p>01.03.2024</p>
                                        <p>20:00h</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Hero del 2, Toj so kartickite -->
    <section id="Hero2">
        <div class="swiper-container2">
            <div class="swiper mySwiper2">
                <div class="swiper-wrapper swiper-wrapper2">
                    <div class="swiper-slide swiper-slide2" onclick="mitre(0)">
                        <div class="custom-shape">
                            <div class="little_card">
                                <h1>Brainster 1</h1>
                                <div class="little_info">
                                    <p>01.03.2024</p>
                                    <p>20:00h</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="swiper-slide swiper-slide2" onclick="mitre(1)">
                        <div class="custom-shape">
                            <div class="little_card">
                                <h1>Brainster 2</h1>
                                <div class="little_info">
                                    <p>01.03.2024</p>
                                    <p>20:00h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide2" onclick="mitre(2)">
                        <div class="custom-shape">
                            <div class="little_card">
                                <h1>Brainster 3</h1>
                                <div class="little_info">
                                    <p>01.03.2024</p>
                                    <p>20:00h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide2" onclick="mitre(3)">
                        <div class="custom-shape">
                            <div class="little_card">
                                <h1>Brainster 4</h1>
                                <div class="little_info">
                                    <p>01.03.2024</p>
                                    <p>20:00h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide swiper-slide2" onclick="mitre(4)">
                        <div class="custom-shape">
                            <div class="little_card">
                                <h1>Brainster 5</h1>
                                <div class="little_info">
                                    <p>01.03.2024</p>
                                    <p>20:00h</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Skriptite za da rabotat swipers -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    <div class="vecer">
        <div class="vecer_container">
            <h1>Каде одиме вечер?</h1>
            <img src="{{ asset('./images/krugcinja/vecer.png') }}" alt="">

        </div>
    </div>

    <!-- Kalendarot kade treba da ide -->
    <section class="calendar-container">
        <div class="calendar-wrapper">
            <div id="calendar"></div>
        </div>
    </section>

    <!-- Kopce -->

    <div id="overlay" class="overlay"></div>

    <div id="popup" class="popup">
        <span class="close" onclick="closePopUp()">&times;</span>
        <p>This is the popup content.</p>
    </div>

    <!-- Footer -->

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

    <!-- Skriptite za da rabotat swipers -->
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
