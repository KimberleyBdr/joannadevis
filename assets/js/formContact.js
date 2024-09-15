// Retrieve form element references
let formContact = document.getElementById("formContact");
let nameInput = document.getElementById("name");
let emailInput = document.getElementById("email");
let messageInput = document.getElementById("message");

// Character limit
const minMessageLength = 10;
const maxMessageLength = 255;
const maxNameLength = 50;

// Listen for the form submit event
formContact.addEventListener("submit", function (event) {
    // Check the restrictions before submitting the form
    clearErrorMessage(nameInput);
    clearErrorMessage(emailInput);
    clearErrorMessage(messageInput);
    if (!validateName() || !validateEmail() || !validateMessage()) {
        event.preventDefault(); // Prevent form submission
    }

});

// Name field validation function
function validateName() {
    // Get name field value
    let name = nameInput.value.trim();

    // Checks if the field is empty
    if (name === "") {
        displayErrorMessage(nameInput, "Veuillez entrer votre nom");
        return false;
    }
    // Check character limit
    if (name.length > maxNameLength) {
        displayErrorMessage(nameInput, `Le message ne doit pas dépasser ${maxNameLength} caractères`);
        return false;
    }

    // Check if the field contains non-alphabetic characters
    let nameRegex = /^[a-zA-Z\s]+$/;
    if (!nameRegex.test(name)) {
        displayErrorMessage(nameInput, "Le nom ne doit contenir que des lettres");
        return false;
    }


    return true;
}

// Message field validation function
function validateMessage() {
    // Retrieve message field value
    let message = messageInput.value.trim();

    // Check if the field is empty
    if (message === "") {
        displayErrorMessage(messageInput, "Veuillez entrer votre message");
        return false;
    }

    // Check character limit
    if (message.length > minMessageLength) {
        displayErrorMessage(messageInput, `Le message doit avoir au moins ${minMessageLength} caractères`);
        return false;
    }
    if (message.length > maxMessageLength) {
        displayErrorMessage(messageInput, `Le message ne doit pas dépasser ${maxMessageLength} caractères`);
        return false;
    }
    return true;
}

// Email field validation function
function validateEmail() {
    // Retrieve email field value
    let email = emailInput.value.trim();

    // Check if the field is empty
    if (email === "") {
        displayErrorMessage(emailInput, "Veuillez entrer votre adresse e-mail");
        return false;
    }

    // Check if the email address is valid
    let emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!emailRegex.test(email)) {
        displayErrorMessage(emailInput, "Veuillez entrer une adresse e-mail valide");
        return false;
    }

    return true;
}

// Function to display an error message under a field
function displayErrorMessage(inputElement, errorMessage) {
    // Check if there is already an error message displayed
    let errorElement = inputElement.nextElementSibling;
    if (errorElement && errorElement.classList.contains("error-message")) {
        // Update existing error message
        errorElement.textContent = errorMessage;
    } else {
        // Create a new error message element
        errorElement = document.createElement("div");
        errorElement.classList.add("error-message");
        errorElement.textContent = errorMessage;
        inputElement.parentNode.insertBefore(errorElement, inputElement.nextSibling);
    }
}

// Function to suppress an error message
function clearErrorMessage(inputElement) {
    let errorElement = inputElement.nextElementSibling;
    if (errorElement && errorElement.classList.contains("error-message")) {
        errorElement.parentNode.removeChild(errorElement);
    }
}