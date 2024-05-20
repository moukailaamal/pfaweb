<?php
$title = "Modofier le profile ";
?>

<?php ob_start(); ?>
<h2>Informations sur le compte</h2>
<form action="index.php?action=updateProfile&id=<?=$resultat->id?>" method="POST">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" value="<?=$resultat->name?>">

    <label for="adresse">Adresse :</label>
    <input type="text" id="adresse" name="adresse"value="<?=$resultat->adresse?>">

    <label for="numero">Numéro :</label>
    <input type="text" id="numero" name="numero"value="<?=$resultat->numero?>">

    <label for="email">Email :</label>
    <input type="email" id="email" name="email"value="<?=$resultat->email?>">

    <label for="password"> Noveau Mot de passe :</label>
    <input type="password" id="password" name="password">

    <button type="submit">Modifier</button>
</form>
    <?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>