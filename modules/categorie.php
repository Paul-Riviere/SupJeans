<?php

include('../include/db.php');

function getListeCategories() {
    global $pdo;

    $sql = "SELECT * FROM categorie";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getCategorie($idCategorie) {
    global $pdo;

    $sql = "SELECT * FROM categorie WHERE ID_CATEGORIE = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(
        [
            "id" => $idCategorie
        ]
    );

    return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
}
