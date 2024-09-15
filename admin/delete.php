<?php
// start the session
session_start();
// requires our includes
require '../include/configuration.php';
// define the connection
$cnx = getBd();

// if the session isAdmin
if (isset($_SESSION['isAdmin'])) {
    // we do the sql query to select everything from the user table
    $sql = "SELECT * FROM jd_user WHERE u_username = ?";
    $resultRequete = executeRequete($cnx, $sql, array($login_temp));
} else {
    // otherwise we redirect to the login page
    header("Location: ../index.php?page=connexion");
}

// switch for delete
switch ($_GET['delete']) {
    // for the user case
    case "User":
        // get the id in a variable
        $id = $_GET['deleteidUser'];
        // sql query to delete the table with the retrieved id
        // request prepared
        $sqlUser = "DELETE FROM jd_user WHERE u_id = ?";
        // execute the request with the id we retrieved as an array
        $resultRequete = executeRequete($cnx, $sqlUser, array($id));
        // redirect to admin homepage
        header("Location: userAdmin.php?table=User");
        // end of our case
        break;
    case "Message":
        $id = $_GET['deleteidMess'];
        $sqlUser = "DELETE FROM jd_message WHERE m_id = ?";
        $resultRequete = executeRequete($cnx, $sqlUser, array($id));
        header("Location: userAdmin.php?table=Message");
        break;
    case "News":
        $id = $_GET['deleteidNews'];
        $sqlUser = "DELETE FROM jd_news WHERE n_id = ?";
        $resultRequete = executeRequete($cnx, $sqlUser, array($id));
        header("Location: userAdmin.php?table=News");
        break;
    case "Avis":
        $id = $_GET['deleteidAvis'];
        $sqlUser = "DELETE FROM jd_avis WHERE a_id = ?";
        $resultRequete = executeRequete($cnx, $sqlUser, array($id));
        header("Location: userAdmin.php?table=Avis");
        break;
    default:
        // if the case does not exist when we click then we are redirected to the admin reception
        header("Location: userAdmin.php?table=User");
        break;
}

header("Location: userAdmin.php?table=User");
