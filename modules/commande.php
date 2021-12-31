<?php

include('../include/db.php');

function getListeCommandes() {
    global $pdo;

    $sql = "SELECT * FROM commande";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
