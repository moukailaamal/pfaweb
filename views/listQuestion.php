<?php
$title = "Liste des question";
?>

<?php ob_start(); ?>
<h2>Liste des question</h2>
<div class="container">
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>name</th>
                        <th>email</th>
                        <th>Sujet</th>
                        <th> A Repondu?</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contacts as $contact) : ?>
                        <tr>
                            <td><?= $contact->name ?></td>
                            <td><?= $contact->email ?></td>
                            <td><?= $contact->sujet ?></td>
                            <td><?= $contact->repondu ?></td>
                            <td><a class="btn btn-info" href="index.php?action=indexReponse&id=<?= $contact->id ?>">
                                <i class="bi bi-eye"></i> Voir Reponse</a>
                            <a href="index.php?action=repondreQuestionForm&id=<?= $contact->id ?>" class="btn btn-success">Reponde</a></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>