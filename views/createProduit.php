<?php $title = "Créer un produit";?>

<?php ob_start(); ?>

<h2>Créer un nouveau produit</h2>
<form action="index.php?action=storeProduit" method="POST"enctype="multipart/form-data">
    <label for="name">Nom :</label>
    <input type="text" id="name" name="name">
    <label for="stock">Stock :</label>
    <input type="number" id="stock" name="stock" required><br><br>

    <label for="prix">Prix :</label>
    <input type="number" id="prix" name="prix" step="0.01" required><br><br>
    <label for="description">Description :</label><br>
    <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
    <label for="categorie_id">Catégorie :</label>
    <select id="categorie_id" name="categorie_id" required>
        <?php foreach ($categories as $categorie): ?>
            <option value="<?=$categorie->id?>"><?=$categorie->name?></option>
        <?php endforeach; ?>
    </select><br><br>
    <label for="image_path">Image :</label>
    <input type="file" id="image_path" name="image_path" accept="image/*" required><br><br>
    <button type="submit">Créer</button>
</form>



<?php $content = ob_get_clean();
require_once "layout.php";
?>