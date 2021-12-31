<?php
include('../modules/commande.php');

// ROUTES API COMMANDE

if (isset($_GET["action"])) {
    if ($_GET['action'] == 'getListeCommandes') {
        $return = getListeCommandes();
    } elseif ($_GET['action'] == '') {

    } else {
        $return = "Mauvaise URL / Paramètres";
    }
} else {
    $return = "Paramètre 'action' requis";
}

echo json_encode($return);