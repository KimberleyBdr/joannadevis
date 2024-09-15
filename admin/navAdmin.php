<?php
ob_start();
// if the session is not active, it is started
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
// we call our includes
require '../include/configuration.php';
// we define the connection
$cnx = getBd();
// if the isAdmin session is connected, we select the user table
// otherwise we redirect to the homepage of the site
if (isset($_SESSION['isAdmin'])) {
    $sql = "SELECT * FROM jd_user";
    $resultRequete = executeRequete($cnx, $sql);
} else {
    header("Location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS Link -->
    <link rel="stylesheet" href="css/navAdmin.css">
    <link rel="stylesheet" href="css/tableAdmin.css">
</head>

<body>
    <nav>
        <a href="#" class="logo"><img id="loogo" src="../assets/img/burger.png" alt="icon burger"></a>
        <div class="navbar" id="navbar">
            <a href="userAdmin.php?table=User" class="navBtn user">Utilisateur</a>
            <a href="userAdmin.php?table=Message" class="navBtn mess">Message</a>
            <a href="userAdmin.php?table=News" class="navBtn news">Newsletter</a>
            <a href="userAdmin.php?table=Avis" class="navBtn avis">Avis</a>
            <form action="#" method="post">
                <button name="deconnexion" class="navBtn deco">Déconnexion</button>
            </form>
        </div>
    </nav>

    <?php
    // for disconnection
    // if disconnection is pressed
    if (isset($_POST['deconnexion'])) {
        // destroy all sessions
        unset($_SESSION['isAdmin']);
        unset($_SESSION['nomAd']);
        // destroy the section
        session_destroy();
        // then we redirect the homepage of the site
        header('Location: ../index.php');
    }
    ?>