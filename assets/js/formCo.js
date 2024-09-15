// Retrieve form element references
let formCo = document.getElementById("formCo");
let nameInput = document.getElementById("name");
let mdpInput = document.getElementById("mdp");

// Character limit
const maxNameLength = 50;

// Listen for the form submit event
formCo.addEventListener("submit", function (event) {
    // Check the restrictions before submitting the form
    if (!validateMdp() || !validateName()) {
        event.preventDefault(); // Prevent form submission
    }
});

// Name field validation function
function validateName() {
    // Get the value of the name field
    let name = nameInput.value.trim();

    // Checks if the field is empty
    if (name === "") {
        displayErrorMessage(nameInput, "Veuillez entrer votre nom");
        return false;
    }

    // Check the character limit
    if (name.length > maxNameLength) {
        displayErrorMessage(nameInput, `Le message ne doit pas dépasser ${maxNameLength} caractères`);
        return false;
    }

    // Checks if the field contains non-alphabetic characters
    let nameRegex = /^[a-zA-Z\s]+$/;
    if (!nameRegex.test(name)) {
        displayErrorMessage(nameInput, "Le nom ne doit contenir que des lettres");
        return false;
    }

    return true;
}

// Password field validation function
function validateMdp() {
    // Retrieve the value of the password field
    let mdp = mdpInput.value.trim();

    // Checks if the field is empty
    if (mdp === "") {
        displayErrorMessage(mdpInput, "Veuillez entrer votre mot de passe");
        return false;
    }

    // Suppress the error message if it exists
    clearErrorMessage(mdpInput);
    return true;
}

// Function to display an error message under a field
function displayErrorMessage(inputElement, errorMessage) {
    // Checks if there is already an error message displayed
    let errorElement = inputElement.nextElementSibling;
    if (errorElement && errorElement.classList.contains("error-message")) {
        // Updates existing error message
        errorElement.textContent = errorMessage;
    } else {
        // Created a new error message element
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