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
        <tbody id="marques"></tbody>
    </table>
</div>
<script>
    getListeMarques().then(
        res => {
            console.log(res);

            let divMarques = document.getElementById("marques");
            for(const marque of res) {
                divMarques.innerHTML += '<tr>' +
                    '<td>' + marque.NOM + '</td>' +
                    '<td>' + marque.DESCRIPTION + '</td>' +
                    '<td>' + marque.URL_PHOTO + '</td>' +
                    '<td><a href="modifMarque.php?idMarque=' + marque.ID_MARQUE + '">Modifier</a></td>' +
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

