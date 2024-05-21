<?php
$title = "Creer un novelle admi,";
?>

<?php ob_start(); ?>
<h2>Créer un nouveau administrateur</h2>

<form action="index.php?action=registerAdmin" method="POST">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name" required>

    <label for="adresse">Adresse :</label>
    <input type="text" id="adresse" name="adresse" required>

    <label for="numero">Numéro :</label>
    <input type="text" id="numero" name="numero" required>

    <label for="superAdmin">Super Admin ?</label><br>
    <label>
        <input type="radio" name="superAdmin" id="superAdminOui" value="true" required>
        Oui
    </label>
    <label>
        <input type="radio" name="superAdmin" id="superAdminNon" value="false" required>
        Non
    </label><br>

    <label for="email">Email :</label>
    <input type="email" id="email" name="email" required>

    <label for="password">Mot de passe :</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Ajouter</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>