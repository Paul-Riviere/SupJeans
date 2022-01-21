<?php

include('../modules/utilisateur.php');

// ROUTES API UTILISATEUR

if (isset($_GET["action"])) {
    $jsonData = json_decode(file_get_contents('php://input'));

    if ($_GET['action'] == 'inscription') {
        if ($jsonData->utilisateur) {
            try {
                $return = inscription($jsonData->utilisateur);
            } catch (Exception $e) {
                http_response_code(500);
                $return = "ERREUR : " . $e->getMessage();
            }
        } else {
            http_response_code(500);
            $return = "Paramètre manquant";
        }
    }

//    elseif ($_GET['action'] == 'getMarque') {
//        if ($_GET['idMarque']) {
//            $return = getMarque($_GET['idMarque']);
//        } else {
//            http_response_code(500);
//            $return = "Paramètre manquant";
//        }
//    }

    else {
        $return = "Mauvaise URL / Paramètres";
    }
} else {
    $return = "Paramètre 'action' requis";
}

echo json_encode($return);
