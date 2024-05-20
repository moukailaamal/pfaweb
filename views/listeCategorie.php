<?php
$title = "liste des categories";
?>
>
<?php ob_start(); ?>
<h2>Liste des Categories</h2>
<a class="btn btn-secondary" href="index.php?action=createCategorie">Creer une nouvelle Categorie</a>

<table class="table table-bordered table-hover">
    <thead class="table-dark">
        <tr>
            <th>id</th>
            <th>name</th>

        </tr>
    </thead>
    <?php foreach ($resultat as $categorie) : ?>
        <tr>
            <td><?= $categorie->id ?></td>
            <td><?= $categorie->name ?></td>
            <td><a class="btn btn-success" href="index.php?action=editCategorie&id=<?= $categorie->id ?>">modifier</a>
                <a class="btn btn-danger" href="index.php?action=deleteCategorie&id=<?= $categorie->id ?>">supprimer</a>
            </td>
        </tr>
    <?php endforeach; ?>
</table>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php') ?>