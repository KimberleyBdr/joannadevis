<header>    
    <!-- _______________ CONTACT FORM _______________ -->
    <div class="formulaire1">
        <form id="formContact" action="#" method="post">
            <h2>Contactez moi </h2>
            <input type="text" id="name" name="name" placeholder="Nom complet">
            <input type="email" id="email" name="email" placeholder="E-mail">
            <textarea id="message" name="message" placeholder="Message"></textarea>
            <div class="bouton">
                <input type="submit" name="goMess" value="Envoyer">
            </div>
        </form>
    </div>
    <!-- _______________ END OF CONTACT FORM _______________ -->
</header>


<?php
// require config bdd
require_once 'include/configuration.php';
// call bdd
$cnx = getBd();
// check if you press send
if (isset($_POST['goMess'])) {
    // puts the filled fields in variables
    $nomMess = $_POST['name'];
    $mailMess = $_POST['email'];
    $messMess = $_POST['message'];

    // sql request to insert into the jd_message table
    $sql = "INSERT INTO `jd_message`( `m_nom`, `m_mail`, `m_message`) VALUES (?, ?, ?)";
    // execute the query with the variables retrieved in an array
    $resultRequete = executeRequete($cnx, $sql, array($nomMess, $mailMess, $messMess));
}
?>