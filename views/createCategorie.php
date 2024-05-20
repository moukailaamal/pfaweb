<?php
$title = "créer une catégorie";

?>
<?php
?>
<?php ob_start(); ?>
<h2>Créer une nouvelle catégorie</h2>
<form action="index.php?action=storeCategorie" method="POST">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name">
    <button type="submit">Créer</button>
</form>
<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>