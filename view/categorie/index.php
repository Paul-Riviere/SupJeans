<?php
include('../../include_static/head.php');
include('../../include_static/menu.php');
?>

<div class="contenuPage">
    <h1>Liste des catégories</h1>
    <br>
    <br>
    <div>
        <ul id="categories"></ul>
    </div>
</div>
<script>
    getListeCategories().then(
        res => {
            console.log('Categories récupérées : ', res);
            const ulCategories = document.getElementById('categories');
            for (const categorie of res) {
                ulCategories.innerHTML += '<li>' +
                    '<a href="details.php?idCategorie=' + categorie.ID_CATEGORIE + '">' + categorie.NOM + '</a>' +
                    '</li>'
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

