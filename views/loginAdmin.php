<?php
$title = "Connecter a votre compte Admin ";
?>

<?php ob_start(); ?>
<h2>Connecter Admin  </h2>
<form action="index.php?action=loginAdmin" method="POST">
    <label for="email">Email :</label>
    <input type="email" id="email" name="email">

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password">

    <button type="submit">Connecter </button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>