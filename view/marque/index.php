<?php
include('../../include_static/head.php');
include('../../include_static/menu.php');
?>

<div class="contenuPage">
    <h1>Liste des marques</h1>
    <br>
    <br>
    <div>
        <ul id="marques"></ul>
    </div>
</div>
<script>
    getListeMarques().then(
        res => {
            console.log('Marques récupérées : ', res);
            const ulMarques = document.getElementById('marques');
            for (const marque of res) {
                ulMarques.innerHTML += '<li>' +
                    '<a href="details.php?idMarque=' + marque.ID_MARQUE + '">' + marque.NOM + '</a>' +
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

