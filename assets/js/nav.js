$(document).ready(function () {
    // When element with class 'navbar-fostrap' is clicked.
    $('.navbar-fostrap').click(function () {
        // Toggle the 'visible' class on the element with the 'nav-fostrap' class.
        // This means that if the 'visible' class is already present, it will be removed, and if it is absent, it will be added.
        $('.nav-fostrap').toggleClass('visible');

        // Switch the 'cover-bg' class to the 'body' element.
        // This will add or remove a class which, for example, could define a semi-transparent background
        // for all site content when the menu is open.
        $('body').toggleClass('cover-bg');
    });
});

// This part of code adds a scroll event to the window.
window.addEventListener('scroll', function() {
    // Get the element with id 'arrow'.
    let fleche = document.getElementById('fleche');
    
    // Check if the vertical scroll position of the window (window.scrollY) is greater than 0.
    // This means the window is scrolled down.
    if (window.scrollY > 0) {
        // If the window is scrolled down, display the element with id 'arrow'.
        fleche.style.display = 'block';
    } else {
        // Else (if scroll position is up), hide element with id 'arrow'.
        fleche.style.display = 'none';
    }
});
