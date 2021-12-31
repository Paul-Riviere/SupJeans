<?php
include('../../include_static/head.php');
include('../../include_static/menu.php');
?>

<div class="contenuPage">
    <h1>Détail article</h1>
    <br>
    <br>
    <div id="article">
        <p id="nom"></p>
        <p id="marque"></p>
        <p id="categorie"></p>
        <p id="description"></p>
        <p id="prix"></p>
        <p id="photo"></p>
    </div>
</div>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const idJean = urlParams.get('idArticle');
    console.log("ID jean : ", idJean);
    if (idJean) {
        getArticle(idJean).then(
            res => {
                console.log("Article récupéré : ", res);
                document.getElementById('nom').innerText = res.NOM_JEAN;
                document.getElementById('marque').innerText = res.NOM_MARQUE;
                document.getElementById('categorie').innerText = res.NOM_CATEGORIE;
                document.getElementById('description').innerText = res.DESCRIPTION;
                document.getElementById('prix').innerText = res.PRIX;
                document.getElementById('photo').innerText = res.URL_PHOTO;
            },
            err => {
                console.log("ERREUR :" + err);
            }
        );
    }
</script>
<?php
include('../../include_static/footer.php');
?>

