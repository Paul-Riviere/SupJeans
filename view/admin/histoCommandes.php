<?php
include('../../include_static/head.php');
include('../../include_static/menu.php');
?>

<div class="contenuPage">
    <h1>ADMIN - Historique des commandes</h1>
</div>
<script>
    getListeCommandes().then(
        res => {
            console.log(res);
        },
        err => {
            console.log("ERREUR :" + err);
        }
    );
</script>
<?php
include('../../include_static/footer.php');
?>

