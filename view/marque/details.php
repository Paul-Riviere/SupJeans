<?php
include('../../include_static/head.php');
include('../../include_static/menu.php');
?>

<div class="contenuPage">
    <h1>Détail marque</h1>
    <br>
    <br>
    <div id="marque">
        <p id="nom"></p>
        <p id="description"></p>
        <p id="photo"></p>
    </div>
    <br>
    <br>
    <br>
    <table border="1px">
        <thead>
        <th>Nom</th>
        <th>Marque</th>
        <th>Categorie</th>
        <th>Prix</th>
        <th>Description</th>
        <th>Photo</th>
        </thead>
        <tbody id="articles"></tbody>
    </table>
</div>
<script>
    const urlParams = new URLSearchParams(window.location.search);
    const idMarque = urlParams.get('idMarque');
    console.log("ID marque : ", idMarque);
    if (idMarque) {
        getMarque(idMarque).then(
            res => {
                console.log("Marque récupérée : ", res);
                document.getElementById('nom').innerText = res.NOM;
                document.getElementById('description').innerText = res.DESCRIPTION;
                document.getElementById('photo').innerText = res.URL_PHOTO;
            },
            err => {
                console.log("ERREUR :" + err);
            }
        );

        getListeArticlesMarque(idMarque).then(
            res => {
                console.log("Articles récupérés : ", res);

                let divArticles = document.getElementById("articles");
                for(const article of res) {
                    divArticles.innerHTML += '<tr>' +
                        '<td>' + article.NOM_JEAN + '</td>' +
                        '<td>' + article.NOM_MARQUE + '</td>' +
                        '<td>' + article.NOM_CATEGORIE + '</td>' +
                        '<td>' + article.PRIX + '</td>' +
                        '<td>' + article.DESCRIPTION + '</td>' +
                        '<td>' + article.URL_PHOTO + '</td>' +
                        '<td><a href="../article/details.php?idArticle=' + article.ID_JEAN + '">Détails</a></td>' +
                        '</tr>'
                }
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

