<?php
include('../../include_static/head.php');
include('../../include_static/menu.php');
?>

<div class="contenuPage">
    <h1>ADMIN - Catégories</h1>
    <br>
    <br>
    <table border="1px">
        <thead>
        <th>Nom</th>
        <th>Description</th>
        <th>Photo</th>
        </thead>
        <tbody id="categories"></tbody>
    </table>
</div>
<script>
    getListeCategories().then(
        res => {
            console.log(res);

            let divCategories = document.getElementById("categories");
            for(const categorie of res) {
                divCategories.innerHTML += '<tr>' +
                    '<td>' + categorie.NOM + '</td>' +
                    '<td>' + categorie.DESCRIPTION + '</td>' +
                    '<td>' + categorie.URL_PHOTO + '</td>' +
                    '<td><a href="modifCategorie.php?idCategorie=' + categorie.ID_CATEGORIE + '">Modifier</a></td>' +
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

