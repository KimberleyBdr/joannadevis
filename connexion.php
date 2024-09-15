<?php
// require config bdd
require_once 'include/configuration.php';
// call bdd
$cnx = getBd();

// script for login
if (isset($_POST['connexion'])) {
    // puts the filled fields in variables
    $login_temp = $_POST['username'];
    $mdp_temp = $_POST['mdp'];

    // sql request which has the login as a condition
    $sql = "SELECT * FROM jd_user WHERE u_username = ?";
    // execut request
    $resultRequete = executeRequete($cnx, $sql, array($login_temp));

    // checks if the query result has only one selected row
    if ($resultRequete->rowCount() === 1) {
        // transform the result into an array
        $row = $resultRequete->fetch(PDO::FETCH_ASSOC);
        // checks if the given password is that of the database
        if (password_verify($mdp_temp, $row['u_mdp'])) {
            // check if he has role 1 (administrator)
            if ($row['u_role'] == 1) {
                // check if the session is active or not
                if (session_status() !== PHP_SESSION_ACTIVE) {
                    session_start();
                }
                // create two session variables, one retrieving the role the other the name of the person
                $_SESSION['isAdmin'] = $row["u_role"];
                $_SESSION['nomAd'] = $row['u_nomComplet'];
                // redirects to admin page
                header("Location: admin/userAdmin.php?table=User");
            }
        } else {
            // if he does not have the correct password, an error message appears
            loadForm("Veuillez vous identifier avec un mot de passe existant");
        }
    } else {
        // if the login does not work an error message appears
        loadForm("Veuillez vous identifier avec un login existant");
    }
} else {
    loadForm("");
}


?>

<header>
    <!-- _______________ LOGIN FORM _______________ -->
    <div class="formulaire1">
        <form id="formCo" action="index.php?page=connexion" method="post">
            <h2>Connectez vous</h2>
            <input type="text" id="name" name="username" placeholder="Nom d'utilisateur">
            <input type="password" id="mdp" name="mdp" placeholder="Mot de passe">
            <?php
            // create a function to display an error message
            function loadForm($msg){
                echo '<h4>' . $msg . '</h4>';
            }
            ?>
            <div class="bouton"><button name="connexion" value="connexion">Connexion</button></div>
        </form>
    </div>
    <!-- _______________ END OF LOGIN FORM _______________ -->    
</header>
