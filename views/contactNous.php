<?php
$title = " Contact nous";
?>
<?php ob_start(); ?>
<?php

?>
<?php
$admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
?>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h5 class="text-center">Si vous avez une question, n'hésitez pas à la poser</h5>
            <form action="index.php?action=ajouterContact" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" name="email" required>
                </div>
                <div class="mb-3">
                    <label for="sujet" class="form-label">Sujet</label>
                    <textarea class="form-control" id="sujet" name="sujet" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Poser votre question</button>
            </form>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>