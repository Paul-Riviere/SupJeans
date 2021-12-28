<?php

include('../modules/marque.php');

// ROUTES API MARQUE

if (isset($_GET["action"])) {
    if ($_GET['action'] == 'getListeMarques') {
        $return = getListeMarques();
    } elseif ($_GET['action'] == '') {

    } else {
        $return = "Mauvaise URL / Paramètres";
    }
} else {
    $return = "Paramètre 'action' requis";
}

echo json_encode($return);