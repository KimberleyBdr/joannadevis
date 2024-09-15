<?php
// starts the exit delay
ob_start();
ob_start();
ob_start();
ob_start();
// check if the session is active or not
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
} ?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- favicon link -->
    <link rel="icon" type="image/x-icon" href="assets/img/Logo.ico">
    <!-- font link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Liu+Jian+Mao+Cao&family=Open+Sans:wght@400;700&display=swap" rel="stylesheet">
    <!-- css link -->
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <?php
    // check the url of the page
    if (isset($_GET['page'])) {
        // change the css links depending on the case
        switch ($_GET['page']) {
            case 'accueil':
                echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">';
                echo '<link rel="stylesheet" href="assets/css/accueil.css">';
                echo '<title>Joanna Devis - Accueil</title>';
                break;
            case 'qui-je-suis':
                echo '<link rel="stylesheet" href="assets/css/presentation.css">';
                echo '<!-- Lien animate.css -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />';
                echo '<title>Joanna Devis - Qui je suis ?</title>';
                break;
            case 'galerie':
                echo '<link rel="stylesheet" href="assets/css/galerie.css">';
                echo '<title>Joanna Devis - Galerie</title>';
                break;
            case 'prestation':
                echo '<link rel="stylesheet" href="assets/css/prestation.css">';
                echo '<!-- Lien animate.css -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />';
                echo '<title>Joanna Devis - Prestation</title>';
                break;
            case 'mariage':
                echo '<link rel="stylesheet" href="assets/css/services.css">';
                echo '<!-- Lien animate.css -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />';
                echo '<title>Joanna Devis - Mariage</title>';
                break;
            case 'evjf-evjg':
                echo '<link rel="stylesheet" href="assets/css/services.css">';
                echo '<!-- Lien animate.css -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />';
                echo '<title>Joanna Devis - EVJF/EVJG</title>';
                break;
            case 'portrait-studio':
                echo '<link rel="stylesheet" href="assets/css/services.css">';
                echo '<!-- Lien animate.css -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />';
                echo '<title>Joanna Devis - Portrait en studio</title>';
                break;
            case 'portrait-exterieur':
                echo '<link rel="stylesheet" href="assets/css/services.css">';
                echo '<!-- Lien animate.css -->
                <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />';
                echo '<title>Joanna Devis - Portrait en extérieur</title>';
                break;
            case 'contact':
                echo '<link rel="stylesheet" href="assets/css/contact.css">';
                echo '<title>Joanna Devis - Contact</title>';
                break;
            case 'connexion':
                echo '<link rel="stylesheet" href="assets/css/connexion.css">';
                echo '<title>Joanna Devis - Connexion</title>';
                break;
            case 'politique-confidentialite':
                echo '<link rel="stylesheet" href="assets/css/politique.css">';
                echo '<title>Joanna Devis - Politique de confidentialité</title>';
                break;
            case 'mentions-legales':
                echo '<link rel="stylesheet" href="assets/css/politique.css">';
                echo '<title>Joanna Devis - Mentions légales</title>';
                break;
            default:
                echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">';
                echo '<link rel="stylesheet" href="assets/css/accueil.css">';
                echo '<title>Joanna Devis - Accueil</title>';
                break;
        }
    } else {
        // by default it is the home page
        $_GET['page'] = 'accueil';
        echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/css/swiper.min.css">';
        echo '<link rel="stylesheet" href="assets/css/accueil.css">';
        echo '<title>Joanna Devis - Accueil</title>';
    }
    ?>
</head>

<body>
    <!-- _______________ NAVBAR _______________ -->
    <div id="main">
        <div class="container">
            <!-- LOGO -->
            <div class="cn">
                <img id="logo" src="assets/img/LogoHorizontal.png" alt="Logo Joanna Devis">
            </div>
            <!-- NAV -->
            <nav>
                <div class="nav-fostrap">
                    <ul>
                        <li><a href="index.php?page=accueil">Accueil</a></li>
                        <li><a href="index.php?page=qui-je-suis">Qui je suis ?</a></li>
                        <li><a href="index.php?page=galerie">Galerie</a></li>
                        <li><a href="index.php?page=prestation">Prestation<span class="arrow-down"></span></a>
                            <!-- DROPDOWN -->
                            <ul class="dropdown">
                                <li><a href="index.php?page=mariage">Mariage</a></li>
                                <li><a href="index.php?page=evjf-evjg">EVJG / EVJF</a></li>
                                <li><a href="index.php?page=portrait-studio">Portrait en studio</a></li>
                                <li><a href="index.php?page=portrait-exterieur">Portrait en extérieur</a></li>
                            </ul>
                        </li>
                        <li><a href="index.php?page=contact">Contact</a></li>
                        <li class="toggle-button">
                            <input type="checkbox" id="toggle">
                            <label for="toggle"></label>
                        </li>
                    </ul>
                </div>
                <div class="nav-bg-fostrap">
                    <!-- SPAN BURGER MENU -->
                    <div class="navbar-fostrap">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <!-- LOGO FOR RESPONSIVE NAV  -->
                    <a href="" class="title-mobile">
                        <img id="logoBurger" src="assets/img/LogoHorizontal.png" alt="Logo Joanna Devis">
                    </a>
                </div>
            </nav>
            <div class="content"></div>
        </div>
    </div>

    <script src="assets/js/theme.js"></script>