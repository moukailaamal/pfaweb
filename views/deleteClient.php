<?php
$title = "supprimer le client";
?>
<?php
?>
<?php ob_start(); ?>
<h2>supprimer le client</h2>

<p >Veuillez vous supprimer le client: <?= $user->name ?> </p>
<a href="index.php?action=destroyClient&id=<?= $user->id ?>"><button type="submit" class="btn btn-danger">Supprimer</button></a>
<a href="index.php?action=indexAllClients"><button class="btn btn-primary">Annuler</button></a>

<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>

