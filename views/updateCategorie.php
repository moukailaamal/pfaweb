<?php
$title = "modifier une catégorie";?>

<?php ob_start(); ?>
<h2>modifier une nouvelle catégorie</h2>
<form action="index.php?action=updateCategorie&id=<?=$resultat->id?>" method="POST">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name"value="<?=$resultat->name?>">
    <button type="submit">modifier</button>
</form>
<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>