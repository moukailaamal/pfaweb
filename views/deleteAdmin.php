<?php
$title = "supprimer le admin";
?>
<?php
?>
<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="mt-5">Supprimer l'admin</h2>
            <p class="mt-3">Veuillez confirmer la suppression de l'admin : <?= $admin->name ?></p>
            <a href="index.php?action=destroyAdmin&id=<?= $admin->id ?>" class="btn btn-danger">Supprimer</a>
            <a href="index.php?action=indexAllAdmins" class="btn btn-primary">Annuler</a>
        </div>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>
