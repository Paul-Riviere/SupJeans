<?php

include('../include/db.php');

function getListeArticles() {
    global $pdo;

    $sql = "SELECT
                jean.ID_JEAN,
                jean.NOM as NOM_JEAN,
                jean.PRIX,
                jean.URL_PHOTO,
                jean.DESCRIPTION,
                marque.NOM as NOM_MARQUE,
                categorie.NOM as NOM_CATEGORIE
            FROM jean
            INNER JOIN marque ON jean.ID_MARQUE = marque.ID_MARQUE
            INNER JOIN categorie ON jean.ID_CATEGORIE = categorie.ID_CATEGORIE";
    $statement = $pdo->prepare($sql);
    $statement->execute();

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getArticle($idArticle) {
    global $pdo;

    $sql = "SELECT
                jean.ID_JEAN,
                jean.NOM as NOM_JEAN,
                jean.PRIX,
                jean.URL_PHOTO,
                jean.DESCRIPTION,
                marque.NOM as NOM_MARQUE,
                categorie.NOM as NOM_CATEGORIE
            FROM jean
            INNER JOIN marque ON jean.ID_MARQUE = marque.ID_MARQUE
            INNER JOIN categorie ON jean.ID_CATEGORIE = categorie.ID_CATEGORIE
            WHERE ID_JEAN = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(
        [
            "id" => $idArticle
        ]
    );

    return $statement->fetchAll(PDO::FETCH_ASSOC)[0];
}

function getListeArticlesCategorie($idCategorie) {
    global $pdo;

    $sql = "SELECT
                jean.ID_JEAN,
                jean.NOM as NOM_JEAN,
                jean.PRIX,
                jean.URL_PHOTO,
                jean.DESCRIPTION,
                marque.NOM as NOM_MARQUE,
                categorie.NOM as NOM_CATEGORIE
            FROM jean
            INNER JOIN marque ON jean.ID_MARQUE = marque.ID_MARQUE
            INNER JOIN categorie ON jean.ID_CATEGORIE = categorie.ID_CATEGORIE AND categorie.ID_CATEGORIE = :id";
    $statement = $pdo->prepare($sql);
    $statement->execute(
        [
            "id" => $idCategorie
        ]
    );

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

function getListeArticlesMarque($idMarque) {
    global $pdo;

    $sql = "SELECT
                jean.ID_JEAN,
                jean.NOM as NOM_JEAN,
                jean.PRIX,
                jean.URL_PHOTO,
                jean.DESCRIPTION,
                marque.NOM as NOM_MARQUE,
                categorie.NOM as NOM_CATEGORIE
            FROM jean
            INNER JOIN marque ON jean.ID_MARQUE = marque.ID_MARQUE AND marque.ID_MARQUE = :id
            INNER JOIN categorie ON jean.ID_CATEGORIE = categorie.ID_CATEGORIE";
    $statement = $pdo->prepare($sql);
    $statement->execute(
        [
            "id" => $idMarque
        ]
    );

    return $statement->fetchAll(PDO::FETCH_ASSOC);
}
