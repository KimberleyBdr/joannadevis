// Select all images with class "image"
const images = document.querySelectorAll('.image');

// Select the close modal button
const modalClose = document.getElementById('modalClose');

// Select the zoomed image element of the modal
const modalImage = document.getElementById('modalImage');

// Adds a click event to each frame
images.forEach(image => {
    image.addEventListener('click', () => {
        openModal(image.src);
    });
});

// Add a click event to close the modal
modalClose.addEventListener('click', closeModal);

function openModal(imageSrc) {
    const modal = document.getElementById('myModal');

    // Display the modal
    modal.style.display = 'block';

    // Loads the selected image into the modal
    modalImage.src = imageSrc;
}

function closeModal() {
    const modal = document.getElementById('myModal');

    // Close the modal
    modal.style.display = 'none';
}