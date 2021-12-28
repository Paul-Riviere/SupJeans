<?php

include('../include/db.php');

function getListeArticles() {
    global $pdo;

    $sql = "SELECT * FROM jean";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
