<?php
include('conf.php');

// Connexion DB

try {
    $pdo = new PDO("mysql:host=$HOST_DB;dbname=$NOM_DB", $UTILISATEUR_DB, $MDP_DB);
} catch (PDOException $e) {
    die("Error ! : " . $e->getMessage());
}
