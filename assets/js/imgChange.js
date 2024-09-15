// Function to change images when the screen reaches 900px
function changeImagesOnResize() {
    const screenWidth = window.innerWidth;

    if (screenWidth <= 900) {
        document.getElementById('image1').src = 'assets/img/Slider/Slid11.jpg';
        document.getElementById('image2').src = 'assets/img/Slider/Slid22.jpg';
        document.getElementById('image3').src = 'assets/img/Slider/Slid33.jpg';
        document.getElementById('image4').src = 'assets/img/Slider/Slid44.jpg';
    } else {
        document.getElementById('image1').src = 'assets/img/Slider/Slid1.jpg';
        document.getElementById('image2').src = 'assets/img/Slider/Slid2.jpg';
        document.getElementById('image3').src = 'assets/img/Slider/Slid3.jpg';
        document.getElementById('image4').src = 'assets/img/Slider/Slid4.jpg';
    }
}

// Adds an event handler to detect screen size changes
window.addEventListener('resize', changeImagesOnResize);

// Calls the function a first time when loading the page to adjust the images according to the initial screen size
changeImagesOnResize();