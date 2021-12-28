<?php

include('../include/db.php');

function getListeCategories() {
    global $pdo;

    $sql = "SELECT * FROM categorie";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
