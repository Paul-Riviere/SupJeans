<?php
include('../../include_static/head.php');
include('../../include_static/menu.php');
?>

<div class="contenuPage">
    <h1>ADMIN - Articles</h1>
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
    getListeArticles().then(
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
                        '<td><a href="modifArticle.php?idArticle=' + article.ID_JEAN + '">Modifier</a></td>' +
                    '</tr>'
            }
        },
        err => {
            console.log("ERREUR :" + err);
        }
    );
</script>
<?php
include('../../include_static/footer.php');
?>

