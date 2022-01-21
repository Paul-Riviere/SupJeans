<?php
include('conf.php');

// Connexion DB
global $UTILISATEUR_DB, $MDP_DB, $NOM_DB, $HOST_DB, $PORT_DB;

try {
    $pdo = new PDO("mysql:host=$HOST_DB:$PORT_DB;dbname=$NOM_DB", $UTILISATEUR_DB, $MDP_DB);
} catch (PDOException $e) {
    die("Error ! : " . $e->getMessage());
}
