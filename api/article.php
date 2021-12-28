<?php

include('../modules/article.php');

// ROUTES API ARTICLE

if (isset($_GET["action"])) {
    if ($_GET['action'] == 'getListeArticles') {
        $return = getListeArticles();
    } elseif ($_GET['action'] == '') {

    } else {
        http_response_code(500);
        $return = "Mauvaise URL ou parametres";
    }
} else {
    http_response_code(500);
    $return = "Paramètre 'action' requis";
}

echo json_encode($return);
