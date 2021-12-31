<?php

include('../modules/article.php');

// ROUTES API ARTICLE

if (isset($_GET["action"])) {
    if ($_GET['action'] == 'getListeArticles') {
        $return = getListeArticles();
    } elseif ($_GET['action'] == 'getArticle') {
        if (isset($_GET['idArticle'])) {
            $return = getArticle($_GET['idArticle']);
        } else {
            http_response_code(500);
            $return = "Paramètre manquant";
        }
    } elseif ($_GET['action'] == 'getListeArticlesCategorie') {
        if (isset($_GET['idCategorie'])) {
            $return = getListeArticlesCategorie($_GET['idCategorie']);
        } else {
            http_response_code(500);
            $return = "Paramètre idCategorie manquant";
        }
    } elseif ($_GET['action'] == 'getListeArticlesMarque') {
        if (isset($_GET['idMarque'])) {
            $return = getListeArticlesMarque($_GET['idMarque']);
        } else {
            http_response_code(500);
            $return = "Paramètre idMarque manquant";
        }
    } else {
        http_response_code(500);
        $return = "Mauvaise URL ou parametres";
    }
} else {
    http_response_code(500);
    $return = "Paramètre 'action' requis";
}

echo json_encode($return);
