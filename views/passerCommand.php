<?php
$title = "Passer votre votre command";
?>

<?php ob_start(); ?>
<h2>Remplir votre formulaire et passer votre commannd</h2>
<form action="index.php?action=passerCommand" method="POST">
    <label for="adresse">Adresse</label>
    <input type="text" name="adresse" id="adresse">
    <label for="numero">Numero</label>
    <input type="text" name="numero" id="numero">
    <label for="cart_bancaire">Votre carte bancaire</label>
    <input type="text" name="cart_bancaire" id="cart_bancaire" pattern="[0-9]{12}" title="Veuillez saisir exactement 9 chiffres">

    <button type="submit">Passer votre Commande</button>
</form>

<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>
