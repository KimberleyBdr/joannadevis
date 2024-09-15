// // Get all elements with class s1
const divServ = document.getElementsByClassName("s1");

// // Browse the array of div class s1
for (let i = 0; i < divServ.length; i++) {
    // When we pass over the div it changes the style
    divServ[i].addEventListener("mouseover", () => {
        divServ[i].style.background = "var(--primary-color)";
        divServ[i].style.color = "var(--text-color)";
        divServ[i].style.borderRadius = "55px 0 55px 0";

        let h2 = divServ[i].querySelector('h2');
        h2.style.color = "var(--hover-pres)";
        h2.style.fontWeight = "900";

        let tarif = divServ[i].querySelector('span');
        tarif.style.color = "var(--hover-pres)";
        tarif.style.fontWeight = "900";
    });
    // When we start from the div it goes back to the style before
    divServ[i].addEventListener("mouseleave", () => {
        divServ[i].style.background = "var(--bg-color)";
        divServ[i].style.color = "var(--base-color)";
        divServ[i].style.borderRadius = "none";

        let h2 = divServ[i].querySelector('h2');
        h2.style.color = "var(--primary-color)";
        h2.style.fontWeight = "900";

        let tarif = divServ[i].querySelector('span');
        tarif.style.color = "var(--primary-color)";
        tarif.style.fontWeight = "900";
    });
}

// Declaration of each div
const mariage = document.querySelector('.mariage');
const evjf = document.querySelector('.evjf');
const studio = document.querySelector('.studio');
const exterieur = document.querySelector('.exterieur');

// Redirection to the corresponding pages
mariage.addEventListener("click", () => {
    window.location.href = 'index.php?page=mariage';
});

evjf.addEventListener("click", () => {
    window.location.href = 'index.php?page=evjf-evjg';
});

studio.addEventListener("click", () => {
    window.location.href = 'index.php?page=portrait-studio';
});

exterieur.addEventListener("click", () => {
    window.location.href = 'index.php?page=portrait-exterieur';
});