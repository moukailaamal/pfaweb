<?php
$title = "Liste des clients";
?>
<?php
?>
<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h5>Réponse au question</h5>
            <div class="mb-3">
                    <label for="sujet" class="form-label">Le sujet :</label>
                    <textarea class="form-control" id="sujet" name="sujet" rows="5" readonly><?= $contact->sujet ?></textarea>
                </div>
            <div class="mb-3">
                <label for="reponse" class="form-label">Réponse :</label>
                <p class="form-control" id="reponse" name="reponse"><?= $contact->reponse ?></p>
            </div>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>