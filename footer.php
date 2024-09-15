<?php
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}

$isAdmin = isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true;
?>
<!-- _______________ COOKIES MANAGER _______________ -->
<div id="cookieConsent">
    <p>Ce site utilise des cookies pour améliorer votre expérience. Voulez-vous les accepter ?</p>
    <button id="acceptBtn">Accepter</button>
    <button id="rejectBtn">Refuser</button>
</div>
<!-- _______________ END OF COOKIES MANAGER _______________ -->

<!-- _______________ FOOTER _______________ -->
<footer>
    <div class="footPart1">
        <!-- SUMMARY PRESENTATION -->
        <div class="resumePres">
            <p class="JoannaD">Joanna Devis</p>
            <p class="pres">
                Photographe indépendante passionnée par
                l'art de capturer des moments uniques et précieux.
                Avec son approche professionnelle et chaleureuse,
                j'essaie de créer une atmosphère confortable qui
                permet de vous sentir à l'aise devant la caméra.
                Je met un point d'honneur à comprendre vos besoins
                et vos attentes, afin de créer des images qui
                reflètent votre personnalité et votre histoire.
            </p>
        </div>
        <!-- CONTACT DETAILS -->
        <div class="coordonnee">
            <h5>Coordonnées</h5>
            <ul class="footList1">
                <li>Studio Devis</li>
                <li>4 rue Montrans</li>
                <li>45 000 Orléans</li>
            </ul>
            <ul class="footList2">
                <li>06 55 24 75 96</li>
                <li>joannadevis@gmail.com</li>
                <?php if ($isAdmin) { ?>
                    <li><a href="deconnexion.php">Déconnexion</a></li>
                <?php } else { ?>
                    <li><a href="index.php?page=connexion">Connexion</a></li>
                <?php } ?>
            </ul>
        </div>
        <!-- SOCIAL NETWORKS -->
        <div class="reseau">
            <div class="resPart1">
                <img id="insta" src="assets/img/Icone/instR.png" alt="logo instagram rose">
                <img id="yt" src="assets/img/Icone/ytR.png" alt="logo you tube rose">
            </div>
            <div class="resPart1">
                <img id="fb" src="assets/img/Icone/fbR.png" alt="logo facebook rose">
                <img id="discord" src="assets/img/Icone/discordR.png" alt="logo discord rose">
            </div>
        </div>
    </div>
    <!-- COPYRIGHT -->
    <div class="footpart2">
        <div class="fp1">
            <p>©2023 Copyright Joanna Devis</p>
        </div>
        <div class="fp2">
            <a href="index.php?page=politique-confidentialite">Politique de confidentialité</a>
            <a href="index.php?page=mentions-legales">Mentions légales</a>
        </div>
    </div>
</footer>
<!-- _______________ END OF FOOTER _______________ -->

<!-- _______________ REDIRECTIONAL ARROWS _______________ -->
<a id="fleche" href="#">
    <img id="flee" src="assets/img/Fleche.png" alt="fleche pour remonter">
</a>
<!-- _______________ END OF REDIRECTIONAL ARROWS _______________ -->

<!-- LINK JQUERY -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<!-- LINK JS -->
<script src="assets/js/nav.js"></script>
<script src="assets/js/cookies.js"></script>

<?php
// check the url of the page
if (isset($_GET['page'])) {
    // add js links following the page url
    switch ($_GET['page']) {
        case 'accueil':
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>';
            echo '<script type="text/javascript" src="assets/js/carou.js"></script>';
            echo '<script type="text/javascript" src="assets/js/slidGalerie.js"></script>';
            echo '<script type="text/javascript" src="assets/js/imgChange.js"></script>';
            break;
        case 'qui-je-suis':
            echo '<script src="assets/js/theme.js"></script>';
            break;
        case 'galerie':
            echo '<script src="assets/js/theme.js"></script>';
            echo '<script type="text/javascript" src="assets/js/modal.js"></script>';
            break;
        case 'prestation':
            echo '<script src="assets/js/prestation.js"></script>';
            echo '<script src="assets/js/theme.js"></script>';
            break;
        case 'mariage':
            echo '<script src="assets/js/theme.js"></script>';
            echo '<script type="text/javascript" src="assets/js/modal.js"></script>';
            break;
        case 'evjf-evjg':
            echo '<script src="assets/js/theme.js"></script>';
            echo '<script type="text/javascript" src="assets/js/modal.js"></script>';
            break;
        case 'portrait-studio':
            echo '<script src="assets/js/theme.js"></script>';
            echo '<script type="text/javascript" src="assets/js/modal.js"></script>';
            break;
        case 'portrait-exterieur':
            echo '<script src="assets/js/theme.js"></script>';
            echo '<script type="text/javascript" src="assets/js/modal.js"></script>';
            break;
        case 'contact':
            echo '<script src="assets/js/theme.js"></script>';
            echo '<script src="assets/js/formContact.js"></script>';
            break;
        case 'connexion':
            echo '<script src="assets/js/theme.js"></script>';
            echo '<script src="assets/js/formCo.js"></script>';
            break;
        case 'politique-confidantialite':
            echo '<script src="assets/js/theme.js"></script>';
            break;
        case 'mentions-legales':
            echo '<script src="assets/js/theme.js"></script>';
            break;
        default:
            echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>';
            echo '<script type="text/javascript" src="assets/js/carou.js"></script>';
            echo '<script type="text/javascript" src="assets/js/imgChange.js"></script>';
            echo '<script type="text/javascript" src="assets/js/slidGalerie.js"></script>';
            break;
    }
} else {
    // by default we use those of the home page
    $_GET['page'] = 'accueil';
    echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.5/js/swiper.min.js"></script>';
    echo '<script type="text/javascript" src="assets/js/carou.js"></script>';
    echo '<script type="text/javascript" src="assets/js/imgChange.js"></script>';
    echo '<script type="text/javascript" src="assets/js/slidGalerie.js"></script>';
}
?>
</body>

</html>