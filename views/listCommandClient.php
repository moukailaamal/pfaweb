<?php
$title = "Mon historique";
?>
<?php ob_start(); ?>
<h2>Mon historique</h2>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>id</th>
                        <th>statut</th>
                        <th>adresse</th>
                        <th>numero</th>
                        <th>contenu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($historiques as $historique) : ?>
                        <tr>
                            <td><?= $historique->id ?></td>
                            <td><?= $historique->statut ?></td>
                            <td><?= $historique->adresse ?></td>
                            <td><?= $historique->numero ?></td>
                            <td><a class="btn btn-info" href="index.php?action=contenuCommand&id=<?= $historique->id ?>">
                                    <i class="bi bi-eye"></i> Voir</a></td>
                                    <td>
    <a href="index.php?action=annulerCommand&id=<?= $historique->id ?>" class="btn btn-danger">Annuler</a>
    <a href="index.php?action=activerCommand&id=<?= $historique->id ?>" class="btn btn-success">Activer</a>
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