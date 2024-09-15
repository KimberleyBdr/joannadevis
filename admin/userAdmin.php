<?php
include 'navAdmin.php';
// require our include
require '../include/configuration.php';
// connection initialization
$cnx = getBd();
?>

<main>
    <!-- we get the name of the admin in a session variable -->
    <h1>Bienvenue <?= $_SESSION['nomAd']; ?></h1>

    <?php
    // switch following url table=
    switch ($_GET['table']) {
        case 'User':
            // start a section
            echo '<section class="readUser">';
            // sql request
            $sqlUser = "SELECT * FROM jd_user";
            // execut request
            $resultRequete = executeRequete($cnx, $sqlUser);
            // at the top of the table
            echo '<table>
                        <tr>
                            <th>ID User</th>
                            <th>Nom complet</th>
                            <th>Role</th>
                            <th>Identifiant</th>
                            <th>Mot de passe</th>
                            <th>Action</th>
                        </tr>';
            // while loop to browse all the data return in an array thanks to the fecth
            while ($nomUser = $resultRequete->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr>
                            <td>' . $nomUser['u_id'] . '</td>
                            <td>' . $nomUser['u_nomComplet'] . '</td>
                            <td>' . $nomUser['u_role'] . '</td>
                            <td>' . $nomUser['u_username'] . '</td>
                            <td>' . $nomUser['u_mdp'] . '</td>
                            <td>'
                    . '<a href="consult.php?consult=User&consultidUser=' . $nomUser['u_id'] . '" class="edit"><img src="../assets/img/consult.png" alt="icone consulter"></a>
                                <a href="update.php?update=User&updateidUser=' . $nomUser['u_id'] . '" class="edit"><img src="../assets/img/update.png" alt="icone modifier"></a>
                                <a href="delete.php?delete=User&deleteidUser=' . $nomUser['u_id'] . '" class="edit"><img src="../assets/img/delete.png" alt="icone supprimer"></a>
                            </td>
                        </tr>';
            }
            // end of table
            echo '</table>';
            // starts the form which allows you to go to the create page
            echo    '<form class="add" name="formulaire" action="" method="POST">
                            <a href="create.php?create=User" class="edit">Ajouter</a>
                        </form>';

            echo '</section>';
            break;
        case 'Message':
            echo '<section class="readMess">';
            $sqlMess = "SELECT * FROM jd_message";
            $requeteMess = executeRequete($cnx, $sqlMess);

            echo '<table>
                        <tr>
                            <th>ID Message</th>
                            <th>Nom complet</th>
                            <th>Mail</th>
                            <th>Message</th>
                            <th>Action</th>
                        </tr>';
            while ($rowMess = $requeteMess->fetch(PDO::FETCH_ASSOC)) {
                echo    '<tr>
                                <td>' . $rowMess['m_id'] . '</td>
                                <td>' . $rowMess['m_nom'] . '</td>
                                <td>' . $rowMess['m_mail'] . '</td>
                                <td class="wMess">' . $rowMess['m_message'] . '</td>
                                <td>'
                    .       '<a href="consult.php?consult=Message&consultidMess=' . $rowMess['m_id'] . '" class="edit"><img src="../assets/img/consult.png" alt="icone consulter"></a>
                                    <a href="delete.php?delete=Message&deleteidMess=' . $rowMess['m_id'] . '" class="edit"><img src="../assets/img/delete.png" alt="icone supprimer"></a>
                                </td>
                            </tr>';
            }
            echo '</table>';
            echo '</section>';
            break;
        case 'News':
            echo '<section class="readNews">';
            $sqlNews = "SELECT * FROM jd_news";
            $requeteNews = executeRequete($cnx, $sqlNews);

            echo '<table>
                        <tr>
                            <th>ID News</th>
                            <th>Mail</th>
                            <th>Action</th>
                        </tr>';
            while ($rowNews = $requeteNews->fetch(PDO::FETCH_ASSOC)) {
                echo    '<tr>
                            <td>' . $rowNews['n_id'] . '</td>
                            <td>' . $rowNews['n_mail'] . '</td>
                            <td>'
                    . '<a href="consult.php?consult=News&consultidNews=' . $rowNews['n_id'] . '" class="edit"><img src="../assets/img/consult.png" alt="icone consulter"></a>
                                <a href="delete.php?delete=News&deleteidNews=' . $rowNews['n_id'] . '" class="edit"><img src="../assets/img/delete.png" alt="icone supprimer"></a>
                            </td>
                        </tr>';
            }
            echo '</table>';
            echo '</section>';
            break;
        case 'Avis':
            echo '<section class="readAvis">';
            $sqlAvis = "SELECT * FROM jd_avis";
            $requeteAvis = executeRequete($cnx, $sqlAvis);

            echo '<table>
                    <tr>
                        <th>ID Avis</th>
                        <th>Nom complet</th>
                        <th>Image</th>
                        <th>Message</th>
                        <th>Date</th>
                        <th>Action</th>
                    </tr>';
            while ($rowAvis = $requeteAvis->fetch(PDO::FETCH_ASSOC)) {
                echo'<tr>
                        <td>' . $rowAvis['a_id'] . '</td>
                        <td>' . $rowAvis['a_nomComplet'] . '</td>
                        <td>' . $rowAvis['a_img'] . '</td>
                        <td class="wMess">' . $rowAvis['a_message'] . '</td>
                        <td>' . $rowAvis['a_date'] . '</td>
                        <td>'
                .           '<a href="consult.php?consult=Avis&consultidAvis=' . $rowAvis['a_id'] . '" class="edit"><img src="../assets/img/consult.png" alt="icone consulter"></a>
                            <a href="update.php?update=Avis&updateidAvis=' . $rowAvis['a_id'] . '" class="edit"><img src="../assets/img/update.png" alt="icone modifier"></a>
                            <a href="delete.php?delete=Avis&deleteidAvis=' . $rowAvis['a_id'] . '" class="edit"><img src="../assets/img/delete.png" alt="icone supprimer"></a>
                        </td>
                    </tr>';
            }
            echo '</table>';
            echo    '<form class="add" name="formulaire" action="" method="POST">
                        <a href="create.php?create=Avis">Ajouter</a>
                    </form>';
            echo '</section>';
            break;
        default:
            header("Location: indexAdmin.php");
            break;
    }
    ?>
</main>

<?php
// include footer
include 'footerAdmin.php';
?>