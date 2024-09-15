<?php
// Start session
session_start();
// include the nav
include 'navAdmin.php';

?>
<main>
    <section class="createBD">
        <?php
        //  Create User 
        switch ($_GET["create"]) {
            case 'User':
                // creation of the form
                echo '
                <h2>Ajoute un Utilisateur</h2>
                <form class="form" action="" method="POST">
                    <div>
                        <label for="roleUser">Role : </label>
                        <input type="text" name="roleUser" id="role">
                    </div>
                    <div>
                        <label for="usernameUser">Identifiant : </label>
                        <input type="text" name="usernameUser" id="username">
                    </div>
                    <div>
                        <label for="mdpUser">Mot de passe : </label>
                        <input type="text" name="mdpUser" id="mdp">
                    </div>
                    <div>
                        <label for="nomUser">Nom complet : </label>
                        <input type="text" name="nomUser" id="nomUser">
                    </div>
                    <div class="button">
                        <button type="submit" name="goUser">Envoyer</button>
                        <a class="index" href="userAdmin.php?table=User">Retour</a>
                    </div>
                </form>
                ';
                break;
            case 'Avis':
                echo '
                <h2>Ajoute un Avis</h2>
                <form class="form" action="" method="POST">
                    <div>
                        <label for="nomAvis">Nom complet : </label>
                        <input type="text" name="nomAvis" id="n_avis">
                    </div>
                    <div>
                        <label for="imgAvis">Image : </label>
                        <input type="text" name="imgAvis" id="i_avis">
                    </div>
                    <div>
                        <label for="messAvis">Message : </label>
                        <input type="text" name="messAvis" id="m_avis">
                    </div>
                    <div>
                        <label for="dateAvis">Date : </label>
                        <input type="date" name="dateAvis" id="d_avis">
                    </div>
                    <div class="button">
                        <button type="submit" name="goAvis">Envoyer</button>
                        <a class="index" href="userAdmin.php?table=Avis">Retour</a>
                    </div>
                </form>
                ';
                break;
            // by default if no case is used redirect to admin homepage
            default:
                header("Location: userAdmin.php?table=User");
        }

        // if we press the button with the name goUser
        if (isset($_POST['goUser'])) {
            // then we get the password in a variable
            $pw = $_POST['mdpUser'];
            // then we create a variable that hashes the password thanks to the password_hash function
            $jeton = password_hash($pw, PASSWORD_DEFAULT);
            // get the other data in variables
            $roleUser = $_POST['roleUser'];
            $usernameUser = $_POST['usernameUser'];
            $nomUser = $_POST['nomUser'];

            // we create our sql query which allows us to insert into the user table
            // by making a prepare request
            $sql = "INSERT INTO jd_user (u_role, u_username, u_mdp, u_nomComplet) VALUES (?, ?, ?, ?)";
            // then we execute our query by making an array of our recovered data
            $resultRequete = executeRequete($cnx, $sql, array($roleUser, $usernameUser, $jeton, $nomUser));
            echo 'Utilisateur ajouté avec succès';
        }

        if (isset($_POST['goAvis'])) {
            $nomAvis = $_POST['nomAvis'];
            $imgAvis = $_POST['imgAvis'];
            $messAvis = $_POST['messAvis'];
            $dateAvis = $_POST['dateAvis'];

            $sql = "INSERT INTO jd_avis (a_nomComplet, a_img, a_message, a_date) VALUES (?, ?, ?, ?)";
            $resultRequete = executeRequete($cnx, $sql, array($nomAvis, $imgAvis, $messAvis, $dateAvis));
            echo 'Avis ajouté avec succès';
        }
        ?>
    </section>
</main>
<?php
// include footer
include 'footerAdmin.php';
?>