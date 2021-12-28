<?php

include('../include/db.php');

// FONCTIONS MARQUE

function getListeMarques()
{
    global $pdo;

    $sql = "SELECT * FROM marque";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
