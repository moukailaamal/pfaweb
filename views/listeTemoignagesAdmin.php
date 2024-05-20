<?php
$title = "Liste des temoignage ";
?>

<?php ob_start(); ?>
<h2>Liste des temoignages</h2>
<div class="container">
    <div class="row">
        <div class="col">
        <table class="table table-bordered table-hover">
        <thead class="table-dark">
                    <tr>
                        <th>le produit</th>
                        <th>id_produit</th>
                        <th>user_id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>avis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($temoignages as $temoignage): ?>
                    <tr>
                    <td><img src="<?= $temoignage->image_path ?>"style="max-width: 150px; max-height: 150px;" alt="image"></td>
                    <td><?= $temoignage->produit_id ?></td>
                        <td><?= $temoignage->user_id ?></td>
                        <td><?= $temoignage->name ?></td>
                        <td><?= $temoignage->email ?></td>
                        <td><?= $temoignage->avis ?></td>
                       <td>
                        <a href="index.php?action=destroyTemoignage&id=<?=$temoignage->id?>" class="btn btn-danger">supprimer</a>
                    </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>