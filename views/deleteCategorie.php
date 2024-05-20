<?php
$title = "supprimer une catégorie";
?>
<?php
?>
<?php ob_start(); ?>
<h2>supprimer catégorie</h2>

<p>Veuillez vous supprimer le categorie: <?=$resultat->name?></p>
<a href="index.php?action=destroyCategorie&id=<?=$resultat->id?>"><button type="submit">supprimer</button></a>
<a href="index.php?action=indexAllCategorie"><button>Annuler</button></a>

<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>