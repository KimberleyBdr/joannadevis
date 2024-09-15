<?php
session_start();
include 'navAdmin.php';

?>

<main>
    <section class="consultBD">
        <?php
        // we create a switch that allows us to display the consul of the requested tables
        switch ($_GET['consult']) {
                // for the user table
            case "User":
                // if the get is is different from empty
                if (!empty($_GET["consultidUser"])) {
                    // then we get the id
                    $id = (int)$_GET["consultidUser"];
                    // then we select all of the user table according to the idea that we recovered in the get
                    $sql = "SELECT * FROM jd_user WHERE u_id = ?";
                    // execute the query
                    $resultRequete = executeRequete($cnx, $sql, array($id));
                    // if it is different from resultRequete
                    if (!$resultRequete) {
                        // then we redirect to the homepage
                        header("Location: userAdmin.php?table=User");
                    }
                } else {
                    // if the get is empty we also redirect to the homepage
                    header("Location: userAdmin.php?table=User");
                }
                // we display the table once we have checked if it was good or not
                echo '<table>
                <tr>
                    <th>ID User</th>
                    <th>Nom complet</th>
                    <th>Role</th>
                    <th>Identifiant</th>
                    <th>Mot de passe</th>
                </tr>';
                // we make a while loop to display in the table the data we need
                // fetch to retrieve them as an array
                while ($row = $resultRequete->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>
                        <td>' . $row['u_id'] . '</td>
                        <td>' . $row['u_nomComplet'] . '</td>
                        <td>' . $row['u_role'] . '</td>
                        <td>' . $row['u_username'] . '</td>
                        <td>' . $row['u_mdp'] . '</td>
                    </tr>';
                }
                echo '</table>
                <a class="index" href="userAdmin.php?table=User">Retour</a>';
                // don't forget to break to finish the case
                break;
            case "Message":
                if (!empty($_GET["consultidMess"])) {
                    $id = (int)$_GET["consultidMess"];
                    $sql = "SELECT * FROM jd_message WHERE m_id = ?";
                    $resultRequete = executeRequete($cnx, $sql, array($id));
                    if (!$resultRequete) {
                        header("Location: userAdmin.php?table=User");
                    }
                } else {
                    header("Location: userAdmin.php?table=User");
                }
                echo '<table>
                <tr>
                    <th>ID Message</th>
                    <th>Nom complet</th>
                    <th>Mail</th>
                    <th>Message</th>
                </tr>';
                while ($row = $resultRequete->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>
                        <td>' . $row['m_id'] . '</td>
                        <td>' . $row['m_nom'] . '</td>
                        <td>' . $row['m_mail'] . '</td>
                        <td>' . $row['m_message'] . '</td>
                    </tr>';
                }
                echo '</table>
                <a class="index" href="userAdmin.php?table=Message">Retour</a>';
                break;
            case "News":
                if (!empty($_GET["consultidNews"])) {
                    $id = (int)$_GET["consultidNews"];
                    $sql = "SELECT * FROM jd_news WHERE n_id = ?";
                    $resultRequete = executeRequete($cnx, $sql, array($id));
                    if (!$resultRequete) {
                        header("Location: userAdmin.php?table=User");
                    }
                } else {
                    header("Location: userAdmin.php?table=User");
                }
                echo '<table>
                <tr>
                    <th>ID News</th>
                    <th>Mail</th>
                </tr>';
                while ($row = $resultRequete->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>
                        <td>' . $row['n_id'] . '</td>
                        <td>' . $row['n_mail'] . '</td>
                    </tr>';
                }
                echo '</table>
                <a class="index" href="userAdmin.php?table=News">Retour</a>';
                break;
            case "Avis":
                if (!empty($_GET["consultidAvis"])) {
                    $id = (int)$_GET["consultidAvis"];
                    $sql = "SELECT * FROM jd_avis WHERE a_id = ?";
                    $resultRequete = executeRequete($cnx, $sql, array($id));
                    if (!$resultRequete) {
                        header("Location: userAdmin.php?table=User");
                    }
                } else {
                    header("Location: userAdmin.php?table=User");
                }
                echo '<table>
                <tr>
                    <th>ID Avis</th>
                    <th>Nom complet</th>
                    <th>Image</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>';
                while ($row = $resultRequete->fetch(PDO::FETCH_ASSOC)) {
                    echo '<tr>
                        <td>' . $row['a_id'] . '</td>
                        <td>' . $row['a_nomComplet'] . '</td>
                        <td>' . $row['a_img'] . '</td>
                        <td>' . $row['a_message'] . '</td>
                        <td>' . $row['a_date'] . '</td>
                    </tr>';
                }
                echo '</table>
                <a class="index" href="userAdmin.php?table=Avis">Retour</a>';
                break;
                // by default if none of the cases is taken, we redirect to the admin reception
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