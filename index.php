<?php
// includes navigation bar
include 'nav.php';

// check the url of the page
if (isset($_GET['page'])){
    // includes a page following the page url
    switch ($_GET['page']) {
        case 'accueil':
            include 'accueil.php';
            break;
        case 'qui-je-suis':
            include 'qui-je-suis.php';
            break;
        case 'galerie':
            include 'galerie.php';
            break;
        case 'prestation':
            include 'prestation.php';
            break;
        case 'mariage':
            include 'mariage.php';
            break;
        case 'evjf-evjg':
            include 'evjf-evjg.php';
            break;
        case 'portrait-studio':
            include 'portrait-en-studio.php';
            break;
        case 'portrait-exterieur':
            include 'portrait-en-exterieur.php';
            break;
        case 'contact':
            include 'contact.php';
            break;
        case 'connexion':
            include 'connexion.php';
            break;
        case 'politique-confidentialite':
            include 'politique-confidentialite.php';
            break;
        case 'mentions-legales':
            include 'mentions-legales.php';
            break;
        default:
            include 'accueil.php';
            break;
    }
} else {
    // default page is the home page
    $_GET['page'] = 'accueil';
    include 'accueil.php';
}

// includes footer
include 'footer.php';
?>
