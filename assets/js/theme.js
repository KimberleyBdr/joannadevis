const toggle = document.getElementById("toggle");
const body = document.body;

function setImagesForTheme(theme) {
    if (theme === "dark") {
        document.getElementById('logo').src = 'assets/img/WhiteLogo.png';
        document.getElementById('logoBurger').src = 'assets/img/WhiteLogo.png';
        document.getElementById('insta').src = 'assets/img/Icone/instB.png';
        document.getElementById('yt').src = 'assets/img/Icone/ytB.png';
        document.getElementById('fb').src = 'assets/img/Icone/fbB.png';
        document.getElementById('discord').src = 'assets/img/Icone/discordB.png';
        document.getElementById('flee').src = 'assets/img/Icone/flechB.png';
    } else {
        document.getElementById('logo').src = 'assets/img/LogoHorizontal.png';
        document.getElementById('logoBurger').src = 'assets/img/LogoHorizontal.png';
        document.getElementById('insta').src = 'assets/img/Icone/instR.png';
        document.getElementById('yt').src = 'assets/img/Icone/ytR.png';
        document.getElementById('fb').src = 'assets/img/Icone/fbR.png';
        document.getElementById('discord').src = 'assets/img/Icone/discordR.png';
        document.getElementById('flee').src = 'assets/img/Icone/Fleche.png';
    }
}

// on va écouter la fenetre et le chargement de la page
window.addEventListener("DOMContentLoaded", () => {
    let theme = localStorage.getItem("data-theme");
    if (theme === "dark") {
        body.setAttribute("data-theme", "dark");
        toggle.checked = true;
    } else {
        body.setAttribute("data-theme", "light");
        toggle.checked = false;
    }

    setImagesForTheme(theme); // Set initial images based on the loaded theme.
});

// on appelle la fonction en écoute le changement d'état
toggle.addEventListener("change", () => {
    toggleTheme();
});

// fonction qui change de theme 
// elle vérifie si le bouton est checked ou pas et appelle le thème indiqué
// elle est appelée dans l'écoute de la checkbox
function toggleTheme() {
    if (toggle.checked) {
        // on met dans le stockage local du nav la préférence
        localStorage.setItem("data-theme", "dark");
        body.setAttribute("data-theme", "dark");
    } else {
        localStorage.setItem("data-theme", "light");
        body.setAttribute("data-theme", "light");
    }

    // Update images based on the selected theme.
    let theme = localStorage.getItem("data-theme");
    setImagesForTheme(theme);
}