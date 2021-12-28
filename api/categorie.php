<?php

include('../modules/categorie.php');

// ROUTES API CATEGORIE
if(isset($_GET["action"])) {
    if ($_GET['action'] == 'getListeCategories') {
        $return = getListeCategories();
    } elseif ($_GET['action'] == '') {

    } else {
        $return = "Mauvaise URL / Paramètres";
    }
} else {
    $return = "Paramètre 'action' requis";
}

echo json_encode($return);
