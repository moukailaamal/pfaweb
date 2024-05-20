<?php
$title = "supprimer une Produit";
?>
<?php
?>
<?php ob_start(); ?>
<h2>supprimer Produit</h2>

<p>Veuillez vous supprimer le Produit: <?=$resultat->name?></p>
<a href="index.php?action=destroyProduit&id=<?=$resultat->id?>"><button type="submit">supprimer</button></a>
<a href="index.php?action=indexAllProduit"><button>Annuler</button></a>

<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>