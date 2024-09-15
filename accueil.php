<!-- _______________ HEADER _______________ -->
<header>
    <div class="text">
        <h1>
            " La photographie comme une fenêtre
            ouverte sur le monde. "
        </h1>
        <p>Joanna Devis</p>
        <div>
            <a href="index.php?page=qui-je-suis">Faisons connaissance</a>
        </div>
    </div>
</header>
<!-- _______________ END OF HEADER _______________ -->

<!-- _______________ SERVICE SECTION _______________ -->
<section class="presService">
    <h2>Vous avez un projet ?</h2>
    <div class="services">
        <div class="imgServices">
            <img class="serviceBg" src="assets/img/Mariage/Mariage2.jpg" alt="photo mariées souriant">
            <a href="index.php?page=prestation">
                <div class="serviceBg child2">
                    <h3>Mariage et EVJF/EVJG</h3>
                    <p>
                        Créer des souvenirs intemporels de votre journée de mariage. Que vous
                        prévoyiez une cérémonie intime ou une grande fête, nous nous adaptons
                        à vos besoins pour vous offrir des images magnifiques et authentiques.
                    </p>
                </div>
            </a>
        </div>
        <div class="imgServices">
            <img class="serviceBg" src="assets/img/Famille/Famille3.jpg" alt="famille souriante">
            <a href="index.php?page=prestation">
                <div class="serviceBg child2">
                    <h3>Portrait en studio ou extérieur</h3>
                    <p>
                        Créer des souvenirs intemporels de votre journée de mariage. Que vous
                        prévoyiez une cérémonie intime ou une grande fête, nous nous adaptons
                        à vos besoins pour vous offrir des images magnifiques et authentiques.
                    </p>
                </div>
            </a>
        </div>
    </div>
</section>
<!-- _______________ END OF SERVICE SECTION _______________ -->

<!-- _______________ GALLERY SECTION _______________ -->
<section class="slidContainer">
    <div class="slider">
        <img id="image1" src="assets/img/Slider/Slid1.jpg" alt="mer avec des rochers sur le côté">
        <img id="image2" src="assets/img/Slider/Slid2.jpg" alt="canard sur un lac">
        <img id="image3" src="assets/img/Slider/Slid3.jpg" alt="libellule">
        <img id="image4" src="assets/img/Slider/Slid4.jpg" alt="fleur rouge">
    </div>
    
    <div class="navigation">
        <span class="dot active"></span>
        <span class="dot"></span>
        <span class="dot"></span>
        <span class="dot"></span>
    </div>
</section>
<!-- _______________ END OF GALLERY SECTION _______________ -->

<!-- _______________ NEWSLETTER SECTION _______________ -->
<section>
    <div class="textNews">
        <h2>Deviens le premier à avoir l'information</h2>
        <p>
            Inscrivez-vous à notre newsletter pour rester à jour
            avec les dernières publications et avoir des offres spéciales
            en tant que menbre de notre liste de diffusion, vous bénéficierez
            d'un accès exclusif à du contenu suplémentaire et à des avantages réservés
            uniquement aux abonnés.
        </p>
    </div>

    <!-- FORM -->
    <form action="#" method="POST" class="formulaire">
        <input type="email" id="email" name="email" placeholder="E-mail :" required>
        <input type="submit" name="newsGo" value="REJOINS NOUS">
    </form>
</section>
<!-- _______________ END OF NEWSLETTER SECTION _______________ -->


<!-- _______________ NOTICE SECTION _______________ -->
<section class="slidAvis">
    <div class="blog-slider">
        <div class="blog-slider__wrp swiper-wrapper">
            <?php
            // require config bdd
            require_once 'include/configuration.php';
            // call bdd
            $cnx = getBd();
            // sql query that selects the entire jd_avis table 
            $sql = "SELECT * FROM jd_avis";
            // execut request
            $resultRequete = executeRequete($cnx, $sql);

            // while loop to create a slide at each notice
            while ($slid = $resultRequete->fetch(PDO::FETCH_ASSOC)) {
                echo '<div class="blog-slider__item swiper-slide">
                                <div class="blog-slider__img">
                                    <img src="assets/img/' . $slid['a_img'] . '" alt="jeune femme souriante">
                                </div>
                                <div class="blog-slider__content">
                                    <span class="blog-slider__code">' . $slid['a_date'] . '</span>
                                    <div class="blog-slider__title">' . $slid['a_nomComplet'] . '</div>
                                    <div class="blog-slider__text">
                                        ' . $slid['a_message'] . '
                                    </div>
                                </div>
                            </div>';
            }
            ?>
        </div>
        <div class="blog-slider__pagination"></div>
    </div>
</section>
<!-- _______________ END OF NOTICE SECTION _______________ -->

<?php
// if to retrieve the newsletter form to be integrated into the jd_news table
if (isset($_POST['newsGo'])) {
    // put the email entered in a variable
    $mailNews = $_POST['email'];

    // sql request
    $sql = "INSERT INTO jd_news (n_mail) VALUES (?)";
    // execut request
    $resultRequete = executeRequete($cnx, $sql, array($mailNews));
}
?>