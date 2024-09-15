<?php
// This function executes an SQL query on the database.
// It takes three parameters:
// - $cnx: A PDO representing the database connection.
// - $sql: A string containing the SQL query to execute.
// - $parameter: An optional parameter allowing to provide an array of parameters for prepared statements. It defaults to NULL.
function executeRequete($cnx, $sql, $parametre = NULL){
    // Check if the $parameter parameter is NULL.
    if ($parametre == NULL) {
        // If $parameter is NULL, it means that a simple query can be executed directly
        // using the 'query' method of the PDO object. The result is stored in the $result variable.
        $resultat = $cnx->query($sql);
    } else {
        // If $parameter is not NULL, it means that a prepared statement is needed.
        // The function prepares the request using the 'prepare' method of the PDO object,
        // then execute it using the 'execute' method with the provided $parameter array.
        // The result is stored in the $result variable.
        $resultat = $cnx->prepare($sql);
        $resultat->execute($parametre);
    }
    // The function returns the result of the query (PDOStatement object).
    return $resultat;
}

// This function returns a PDO representing the database connection.
function getBd(){
    // Call the 'connection' function to establish a connection to the database and retrieve the PDO object.
    $cnx = connexion();
    // Return the PDO representing the database connection.
    return $cnx;
}

// This function is responsible for creating and returning a PDO representing the database connection.
function connexion(){
    try {
        // Create a new PDO object with the parameters provided, in particular by specifying the character set in UTF-8
        // and enabling exception handling for database errors (PDO::ERRMODE_EXCEPTION).
        return new PDO('mysql:host=' . SERVER . ';dbname=' . BD, USER, PASSWORD, array(PDO::MYSQL_ATTR_INIT_COMMAND
        => "SET NAMES utf8", PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
    } catch (PDOException $look) {
        // In case of connection error, catches the PDOException exception, displays an error message,
        // However, it is left here for clarity.
        echo "erreur lors de la connexion" . $look->getMessage();
        exit;
    }
    return $cnx;
}