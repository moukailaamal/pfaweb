<?php
$title = "Liste des admin";
?>

<?php ob_start(); ?>
<h2>Liste des admins</h2>
<div class="container">
    <?php if ($_SESSION['superAdmin'] == true) : ?>
        <a class="btn btn-secondary" href="index.php?action=registerFormAdmin">Ajouter un admin</a>
    <?php else : ?>
        <button class="btn btn-secondary" disabled>Ajouter un admin</button>
    <?php endif ?>


    <div class="row">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th>user_id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>numero</th>
                        <th>superAdmin</th>

                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($admins as $admin) : ?>
                        <tr>
                            <td><?= $admin->id ?></td>
                            <td><?= $admin->name ?></td>
                            <td><?= $admin->email ?></td>
                            <td><?= $admin->numero ?></td>
                            <td><?= $admin->superAdmin == 1 ? 'Oui' : 'Non' ?></td>
                            <?php if ($_SESSION['superAdmin'] == true) : ?>
                                <td>
                                    <a href="index.php?action=deleteAdmin&id=<?= $admin->id ?>" class="btn btn-danger">supprimer</a>
                                </td>
                            <?php else : ?>
                                <td>
                                    <button class="btn btn-danger" disabled>supprimer</button>
                                </td>
                            <?php endif ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>