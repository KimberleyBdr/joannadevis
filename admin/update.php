<?php
// session start
session_start();
// includes navigation
include 'navAdmin.php';

?>

<main>
    <section class="updateBD">
        <?php
        // switch for update
        switch ($_GET["update"]) {
            // case for user table
            case "User":
                // Update User 
                // if the id we retrieve is not empty
                if (!empty($_GET["updateidUser"])) {
                    // we get the id in a variable
                    $id = (int)$_GET["updateidUser"];
                    // then we make our sql query
                    $sql = "SELECT * FROM jd_user WHERE u_id = ?";
                    // then we execute it with our id in an array
                    $resultRequete = executeRequete($cnx, $sql, array($id));
                    // if it is different from resultRequete
                    if (!$resultRequete) {
                        // redirect to admin home
                        header("Location: userAdmin.php?table=User");
                    }
                } else {
                    // redirect to admin home if get is empty
                    header("Location: userAdmin.php?table=User");
                }

                // we make our while loop by retrieving the data in an array thanks to the fetch
                while ($row = $resultRequete->fetch(PDO::FETCH_ASSOC)) {
                    // we create our form
                    echo '
                        <h2>Modifie un utilisateur</h2>
                        <form action="" method="POST" class="form">
                            <input type="hidden" name="id_user" value="' . $row['u_id'] . '">

                            <label for="nomUser">Nom complet de l\'utilisateur</label>
                            <input type="text" name="nomUserr" value="' . $row['u_nomComplet'] . '">

                            <label for="roleUser">Role de l\'utilisateur</label>
                            <input type="text" name="roleUserr" value="' . $row['u_role'] . '">

                            <label for="usernameUser">Identifiant de l\'utilisateur</label>
                            <input type="text" name="usernameUserr" value="' . $row['u_username'] . '">

                            <label for="mdpUser">Mot de passe de l\'utilisateur</label>
                            <input type="text" name="mdpUserr" value="' . $row['u_mdp'] . '">

                            <div class="button">
                                <button type="submit" name="go">Modifier</button>
                                <a class="index" href="userAdmin.php?table=User">Retour</a>
                            </div>
                        </form>';
                }
                // if you press Edit and all the fields are filled
                if (isset($_POST["go"]) && !empty($_POST["nomUserr"]) && !empty($_POST["roleUserr"]) && !empty($_POST["usernameUserr"]) && !empty($_POST["mdpUserr"])) {
                    // then we get the data in variables
                    $roleUserr = $_POST['roleUserr'];
                    $usernameUserr = $_POST['usernameUserr'];
                    $mdpUserr = $_POST['mdpUserr'];
                    $nomUserr = $_POST['nomUserr'];

                    // then we do our sql update query
                    // in prepared request
                    $sqlUpdate = "UPDATE jd_user SET u_role = ?, u_username = ?, u_mdp = ?, u_nomComplet = ? WHERE u_id = ?";
                    // we execute the query by putting our variables in an array
                    $resultRequete = executeRequete($cnx, $sqlUpdate, array($roleUserr, $usernameUserr, $mdpUserr, $nomUserr, $id));

                    // then we are redirected to the admin homepage
                    header("Location: userAdmin.php?table=User");
                }
                // end of case
                break;
            case "Avis":
                // Update Notice 
                if (!empty($_GET["updateidAvis"])) {
                    $idAvis = (int)$_GET["updateidAvis"];
                    $sqlAvis = "SELECT * FROM jd_avis WHERE a_id = ?";
                    $requeteAvis = executeRequete($cnx, $sqlAvis, array($idAvis));
                    if (!$requeteAvis) {
                        header("Location: userAdmin.php?table=User");
                    }
                } else {
                    header("Location: userAdmin.php?table=User");
                }
                while ($rowAvis = $requeteAvis->fetch(PDO::FETCH_ASSOC)) {
                    echo '
                        <h2>Modifie un avis</h2>
                        <form action="" method="POST" class="form">
                            <input type="hidden" name="id_avis" value="' . $rowAvis['a_id'] . '">

                            <label for="nomAvis">Nom complet de l\'expéditeur</label>
                            <input type="text" name="nomAvis" value="' . $rowAvis['a_nomComplet'] . '">

                            <label for="imgAvis">Image URL</label>
                            <input type="text" name="imgAvis" value="' . $rowAvis['a_img'] . '">

                            <label for="messAvis">Message de l\'expéditeur</label>
                            <input type="text" name="messAvis" value="' . $rowAvis['a_message'] . '">

                            <label for="dateAvis">Date de l\'avis</label>
                            <input type="date" name="dateAvis" value="' . $rowAvis['a_date'] . '">

                            <div class="button">
                                <button type="submit" name="goAvis">Modifier</button>
                                <a class="index" href="userAdmin.php?table=Avis">Retour</a>
                            </div>
                        </form>';
                }
                if (isset($_POST["goAvis"]) && !empty($_POST["nomAvis"]) && !empty($_POST["imgAvis"]) && !empty($_POST["messAvis"]) && !empty($_POST["dateAvis"])) {
                    $nomAvis = $_POST['nomAvis'];
                    $imgAvis = $_POST['imgAvis'];
                    $messAvis = $_POST['messAvis'];
                    $dateAvis = $_POST['dateAvis'];

                    $sqlUpdateA = "UPDATE jd_avis SET a_nomComplet = ?, a_img = ?, a_message = ?, a_date = ? WHERE a_id = ?";
                    $resultRequete = executeRequete($cnx, $sqlUpdateA, array($nomAvis, $imgAvis, $messAvis, $dateAvis, $idAvis));

                    header("Location: userAdmin.php?table=Avis");
                }
                break;
            default:
                header("Location: userAdmin.php?table=User");
                break;
        }
        ?>
    </section>
</main>
<?php
// include footer
include 'footerAdmin.php';
?>