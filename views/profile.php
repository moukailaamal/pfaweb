<?php
$title = "Mon compte ";
?>

<?php ob_start(); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center">Informations sur le compte</h2>
            <div class="card">
                <div class="card-body">
                    <p class="card-text">
                        <strong>Nom :</strong> <?=$resultat->name?><br>
                        <strong>Adresse :</strong> <?=$resultat->adresse?><br>
                        <strong>Numéro :</strong> <?=$resultat->numero?><br>
                        <strong>Email :</strong> <?=$resultat->email?><br>
                    </p>
                    <a href="index.php?action=editProfile&id=<?=$resultat->id ?>" class="btn btn-success">Modifier Compte</a>
<a href="index.php?action=listCommandClient&id=<?=$resultat->id ?>" class="btn btn-primary">Historique de Commandes</a>
<a href="index.php?action=listeTemoignageClient&id=<?=$resultat->id ?>" class="btn btn-secondary">Mon témoignage</a>

                </div>
            </div>
        </div>
    </div>
</div>

    <?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>