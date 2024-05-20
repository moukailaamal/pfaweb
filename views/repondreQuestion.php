<?php
$title = "Repondre au question ";
?>

<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h5>Repondre au question</h5>
            <form action="index.php?action=repondreQuestion&id=<?= $contact->id ?>" method="POST">
                <div class="mb-3">
                    <label for="sujet" class="form-label">Le sujet :</label>
                    <textarea class="form-control" id="sujet" name="sujet" rows="5" readonly><?= $contact->sujet ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="reponse" class="form-label">Réponse :</label>
                    <textarea class="form-control" id="reponse" name="reponse" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Répondre</button>
            </form>

        </div>
    </div>
</div>



<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>