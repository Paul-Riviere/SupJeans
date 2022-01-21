<?php
include('../../include_static/head.php');
include('../../include_static/menu.php');
?>

<div class="contenuPage">
    <h1>Inscription</h1>
    <br>
    <br>
    <form name="inscription">
        <fieldset>
            <legend><b>Informations du compte</b></legend>
            <label for="email">Adresse mail : </label>
            <input type="email" name="email" id="email">
            <br>
            <label for="motDePasse">Mot de passe : </label>
            <input type="password" name="motDePasse" id="motDePasse">
            <br>
            <label for="prenom">Prénom : </label>
            <input type="text" name="prenom" id="prenom">
            <br>
            <label for="nom">Nom : </label>
            <input type="text" name="nom" id="nom">
        </fieldset>
        <br>
        <fieldset>
            <legend><b>Adresse de livraison</b></legend>
            <label for="memeAdresse">Adresse de facturation identique à l'adresse de livraison</label>
            <input type="checkbox" id="memeAdresse" name="memeAdresse" checked onclick="checkBoxChange()">
            <br>
            <br>
            <label for="numero">Numéro de rue : </label>
            <input type="text" name="numero" id="numero">
            <br>
            <label for="rue">Nom de rue : </label>
            <input type="text" name="rue" id="rue">
            <br>
            <label for="ville">Ville : </label>
            <input type="text" name="ville" id="ville">
            <br>
            <label for="codePostal">Code postal : </label>
            <input type="text" name="codePostal" id="codePostal">
            <br>
            <label for="pays">Pays : </label>
            <input type="text" name="pays" id="pays">
        </fieldset>
        <br>
        <fieldset id="adresseFact" style="display: none">
            <legend><b>Adresse de facturation</b></legend>
            <label for="numeroFact">Numéro de rue : </label>
            <input type="text" name="numeroFact" id="numeroFact">
            <br>
            <label for="rueFact">Nom de rue : </label>
            <input type="text" name="rueFact" id="rueFact">
            <br>
            <label for="villeFact">Ville : </label>
            <input type="text" name="villeFact" id="villeFact">
            <br>
            <label for="codePostalFact">Code postal : </label>
            <input type="text" name="codePostalFact" id="codePostalFact">
            <br>
            <label for="paysFact">Pays : </label>
            <input type="text" name="paysFact" id="paysFact">
        </fieldset>
    </form>
    <br>
    <button onclick="envoyerInscription()">S'inscrire</button>
</div>

<script>
    const inscriptionValeurs = document.forms.inscription.elements;

    function envoyerInscription() {
        let utilisateur = {};

        utilisateur.email = inscriptionValeurs.email.value;
        utilisateur.motDePasse = inscriptionValeurs.motDePasse.value;
        utilisateur.prenom = inscriptionValeurs.prenom.value;
        utilisateur.nom = inscriptionValeurs.nom.value;
        utilisateur.numero = inscriptionValeurs.numero.value;
        utilisateur.rue = inscriptionValeurs.rue.value;
        utilisateur.ville = inscriptionValeurs.ville.value;
        utilisateur.codePostal = inscriptionValeurs.codePostal.value;
        utilisateur.pays = inscriptionValeurs.pays.value;

        utilisateur.memeAdresse = inscriptionValeurs.memeAdresse.checked;

        if (!inscriptionValeurs.memeAdresse.checked) {
            utilisateur.numeroFact = inscriptionValeurs.numeroFact.value;
            utilisateur.rueFact = inscriptionValeurs.rueFact.value;
            utilisateur.villeFact = inscriptionValeurs.villeFact.value;
            utilisateur.codePostalFact = inscriptionValeurs.codePostalFact.value;
            utilisateur.paysFact = inscriptionValeurs.paysFact.value;
        }

        inscription(JSON.stringify({"utilisateur":utilisateur})).then(
            res => {
                console.log("Retour inscription :" + res);
            },
            err => {
                console.log("ERREUR :" + err);
            }
        )
    }

    function checkBoxChange() {
        inscriptionValeurs.memeAdresse.checked ? document.getElementById('adresseFact').style.display = "none" : document.getElementById('adresseFact').style.display = "block";
    }
</script>

<?php
include('../../include_static/footer.php');
?>

