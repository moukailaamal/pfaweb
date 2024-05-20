<?php
$title = "liste des Produits";
?>

<?php ob_start(); ?>
<h2>Liste des Produits</h2>
<a class="btn btn-secondary"href="index.php?action=createProduit">Creer une nouvelle Produit</a>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>id</th>
            <th>name</th>
            <th>description</th>
            <th>stock</th>
            <th>prix</th>
            <th>l'image de produit</th>
            
        </tr>
    </thead>
    <?php foreach ($resultat as $produit) : ?>
        <tr>
            <td><?= $produit->id ?></td>
            <td><?= $produit->name ?></td>
            <td><?= $produit->description ?></td>
            <td><?= $produit->stock ?></td>
            <td><?= $produit->prix ?></td>
            <td><img src="<?= $produit->image_path ?>" alt="Image du produit" class="img-fluid rounded" style="max-width: 150px; max-height: 150px;">
            </td>
            <td><a class="btn btn-success"href="index.php?action=editProduit&id=<?=$produit->id?>">modifier</a>
            <a class="btn btn-danger"href="index.php?action=deleteProduit&id=<?=$produit->id?>">supprimer</a></td>
        </tr>
    <?php endforeach; ?>

</table>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>