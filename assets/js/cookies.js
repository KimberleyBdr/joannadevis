// Function to set a cookie with 3 params
function setCookie(name, value, days) {
    // Creates a new Date object to represent the expiration date of the cookie.
    const expirationDate = new Date();
    // Add the specified number of days to the expiration date.
    expirationDate.setDate(expirationDate.getDate() + days);
    // Encode the cookie value using encodeURIComponent to escape special characters.
    const cookieValue = encodeURIComponent(value) + "; expires=" + expirationDate.toUTCString();

    // Set the cookie in the document.
    // The 'document.cookie' property is used to access browser cookies.
    // The syntax for setting a cookie is "name=value; expires=date; path=path".
    // 'name' represents the name of the cookie, 'cookieValue' is its value and 'path=/' specifies that the cookie is accessible to all pages of the site.
    document.cookie = name + "=" + cookieValue + "; path=/";
}

// Function to retrieve the value of a cookie with one params
function getCookie(name) {
    // Creates a string that contains the name of the cookie followed by "=".
    const cookieName = name + "=";
    // Get all browser cookies and split them into an array using the "; " separator.
    const cookies = document.cookie.split(';');
    // Loop through all cookies in the array to find the cookie with the specified name.
    for (let i = 0; i < cookies.length; i++) {
        // Get the current cookie from the array.
        let cookie = cookies[i];
        // Remove leading spaces from cookie string.
        while (cookie.charAt(0) == ' ') {
            cookie = cookie.substring(1);
        }
        // Check if the cookie starts with the name you are looking for.
        if (cookie.indexOf(cookieName) == 0) {
            return decodeURIComponent(cookie.substring(cookieName.length));
        }
    }
    // If no cookie with the specified name is found, return null.
    return null;
}

// Function to detect the browser
function detectBrowser() {
    const userAgent = navigator.userAgent.toLowerCase();
    if (userAgent.indexOf('firefox') > -1) {
        return 'Firefox';
    } else if (userAgent.indexOf('chrome') > -1) {
        return 'Chrome';
    } else if (userAgent.indexOf('safari') > -1) {
        return 'Safari';
    } else if (userAgent.indexOf('opera') > -1 || userAgent.indexOf('opr') > -1) {
        return 'Opera';
    } else if (userAgent.indexOf('edge') > -1) {
        return 'Edge';
    } else if (userAgent.indexOf('msie') > -1 || userAgent.indexOf('trident') > -1) {
        return 'Internet Explorer';
    } else {
        return 'Autre';
    }
}

// Function to manage the user's choice regarding cookies
function acceptCookies() {
    setCookie('cookiesAccepted', 'true', 30); // Set cookie for 30 days
    const userBrowser = detectBrowser();
    setCookie('userBrowser', userBrowser, 30); // Store the browser name in a cookie for 30 days
    document.getElementById('cookieConsent').style.display = 'none';
    window.location.href = 'index.php';
}

// function to reject cookies
function rejectCookies() {
    setCookie('cookiesAccepted', 'false', 10); // Set cookie for 10 days
    document.getElementById('cookieConsent').style.display = 'none';
    window.location.href = 'index.php';
}

// Added event listeners to buttons
document.getElementById('acceptBtn').addEventListener('click', acceptCookies);
document.getElementById('rejectBtn').addEventListener('click', rejectCookies);

// Example of use
// const userBrowser = detectBrowser();
// console.log("Navigateur détecté : " + userBrowser);

const cookiesAccepted = getCookie('cookiesAccepted');

// Checks if cookies are accepted or refused
if (cookiesAccepted === 'true') {
    document.getElementById('cookieConsent').style.display = 'none';
} else if (cookiesAccepted === 'false') {
    document.getElementById('cookieConsent').style.display = 'none';
} else {
    // Show consent dialog only if choice not yet saved
    const cookieConsent = document.getElementById('cookieConsent');
    cookieConsent.style.display = 'block';
}