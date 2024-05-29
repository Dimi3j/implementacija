document.addEventListener("DOMContentLoaded", function() {
    const navbarHeight = document.querySelector('.navbar').offsetHeight;

    document.documentElement.style.setProperty('--navbar-height', navbarHeight + 'px');
});


