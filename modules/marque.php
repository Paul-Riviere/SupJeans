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

function getMarque($idMarque) {
    global $pdo;

    $sql = "SELECT * FROM marque WHERE ID_MARQUE = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(
        [
            "id" => $idMarque
        ]
    );

    return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
}
