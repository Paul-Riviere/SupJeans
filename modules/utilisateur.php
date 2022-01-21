<?php

include('../include/db.php');

// FONCTIONS UTILISATEUR

function inscription($utilisateur) {
    global $pdo;

    if (!($utilisateur->numero &&
        $utilisateur->rue &&
        $utilisateur->ville &&
        $utilisateur->codePostal &&
        $utilisateur->pays &&
        $utilisateur->prenom &&
        $utilisateur->nom &&
        $utilisateur->email &&
        $utilisateur->motDePasse) || (
            !$utilisateur->memeAdresse &&
            !($utilisateur->numeroFact &&
            $utilisateur->rueFact &&
            $utilisateur->villeFact &&
            $utilisateur->codePostalFact &&
            $utilisateur->paysFact)
        )) {
        throw new Exception("Utilisateur mal rempli");
    }

    try {
        $sqlAdresse = "INSERT INTO ADRESSE(NUMERO, RUE, VILLE, CODE_POSTAL, PAYS)
                   VALUES (:numero, :rue, :ville, :codePostal, :pays)";
        $statementAdresse = $pdo->prepare($sqlAdresse);
        $statementAdresse->execute(
            array(
                ':numero' => $utilisateur->numero,
                ':rue' => $utilisateur->rue,
                ':ville' => $utilisateur->ville,
                ':codePostal' => $utilisateur->codePostal,
                ':pays' => $utilisateur->pays
            )
        );
        if ($statementAdresse->errorCode() != '00000') {
            throw new Exception($statementAdresse->errorInfo()[2]);
        }

        $id_adresse = $pdo->lastInsertId();
        $id_adresse_fact = $pdo->lastInsertId();

        if (!$utilisateur->memeAdresse) {
            $sqlAdresseFact = "INSERT INTO ADRESSE(NUMERO, RUE, VILLE, CODE_POSTAL, PAYS)
                   VALUES (:numero, :rue, :ville, :codePostal, :pays)";
            $statementAdresseFact = $pdo->prepare($sqlAdresseFact);
            $statementAdresseFact->execute(
                array(
                    ':numero' => $utilisateur->numeroFact,
                    ':rue' => $utilisateur->rueFact,
                    ':ville' => $utilisateur->villeFact,
                    ':codePostal' => $utilisateur->codePostalFact,
                    ':pays' => $utilisateur->paysFact
                )
            );
            if ($statementAdresseFact->errorCode() != '00000') {
                throw new Exception($statementAdresseFact->errorInfo()[2]);
            }

            $id_adresse_fact = $pdo->lastInsertId();
        }


        $sqlUtilisateur = "INSERT INTO UTILISATEUR(PRENOM, NOM, MAIL, MOT_DE_PASSE, ADRESSE_FACT, ADRESSE_LIVR, ROLE) 
            VALUES(:prenom, :nom, :mail, :motDePasse, :id_adresse, :id_adresse_fact, :role)";
        $statement = $pdo->prepare($sqlUtilisateur);
        $statement->execute(
            array(
                ':prenom' => $utilisateur->prenom,
                ':nom' => $utilisateur->nom,
                ':mail' => $utilisateur->email,
                ':motDePasse' => $utilisateur->motDePasse,
                ':id_adresse' => $id_adresse,
                ':id_adresse_fact' => $id_adresse_fact,
                ':role' => 0
            )
        );
        if ($statement->errorCode() != '00000') {
            throw new Exception($statement->errorInfo()[2]);
        }
    }
    catch (Exception $e) {
        throw $e;
    }

    return "OK";
}

