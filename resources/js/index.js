/* Za da mi presmeta koklu mi e visinata na navbar */

document.addEventListener("DOMContentLoaded", function() {
    // Get the height of the navbar
    const navbarHeight = document.querySelector('.navbar').offsetHeight;

    // Set the navbar height as a CSS variable
    document.documentElement.style.setProperty('--navbar-height', navbarHeight + 'px');
});

function popUp() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";
}

function closePopUp() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
}
