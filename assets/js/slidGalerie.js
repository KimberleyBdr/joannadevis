// Slider Section Galerie
let slideIndex = 1;

// Displays the current slide on page load
showSlide(slideIndex);

// Wait for the DOM to be fully loaded
document.addEventListener('DOMContentLoaded', function () {
    const dots = document.querySelectorAll('.dot');
    // Add an event handler to each navpoint
    for (let i = 0; i < dots.length; i++) {
        dots[i].addEventListener('click', function () {
            // Call the changeSlide function when the point is clicked
            changeSlide(i + 1);
        });
    }
});

// Function to change slide based on given index
function changeSlide(n) {
    // Show corresponding slide
    showSlide(slideIndex = n);
}

// Function to display the slide corresponding to the given index
function showSlide(n) {
    // Selects all images on the slide and all navigation points
    const slides = document.querySelectorAll('.slider img');
    const dots = document.querySelectorAll('.dot');

    // Check if index is out of bounds
    if (n < 1) slideIndex = slides.length;
    if (n > slides.length) slideIndex = 1;

    // Hides all slide images
    for (let i = 0; i < slides.length; i++) {
        slides[i].style.display = 'none';
    }

    // Removes the "active" class from all waypoints
    for (let i = 0; i < dots.length; i++) {
        dots[i].classList.remove('active');
    }

    // Displays the slide and highlights the active point
    slides[slideIndex - 1].style.display = 'block';
    dots[slideIndex - 1].classList.add('active');
}