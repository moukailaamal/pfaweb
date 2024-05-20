<?php
$title = "Liste des commandes";
?>

<?php ob_start(); ?>
<h2>Liste des commandes</h2>
<div class="container">
    <div class="row">
        <div class="col">
        <table class="table table-bordered table-hover">
        <thead class="table-dark">
                    <tr>
                        <th>user_id</th>
                        <th>statut</th>
                        <th>adresse</th>
                        <th>numero</th>
                        <th>contenu</th>
                        <th>modifier statut</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($historiques as $historique): ?>
                    <tr>
                        <td><?= $historique->user_id ?></td>
                        <td><?= $historique->statut ?></td>
                        <td><?= $historique->adresse ?></td>
                        <td><?= $historique->numero ?></td>
                        <td><a class="btn btn-info" href="index.php?action=contenuCommand&id=<?=$historique->id?>">
                        <i class="bi bi-eye"></i> Voir</a></td>
                        <td><a class="btn btn-success" href="index.php?action=updateStatutAdmin&id=<?=$historique->id?>">Confirmer</a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
   
</div>


<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>