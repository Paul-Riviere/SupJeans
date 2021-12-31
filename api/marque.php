<?php

include('../modules/marque.php');

// ROUTES API MARQUE

if (isset($_GET["action"])) {
    if ($_GET['action'] == 'getListeMarques') {
        $return = getListeMarques();
    } elseif ($_GET['action'] == 'getMarque') {
        if ($_GET['idMarque']) {
            $return = getMarque($_GET['idMarque']);
        } else {
            http_response_code(500);
            $return = "Paramètre manquant";
        }
    } else {
        $return = "Mauvaise URL / Paramètres";
    }
} else {
    $return = "Paramètre 'action' requis";
}

echo json_encode($return);