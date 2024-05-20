<?php
$title = "Liste des clients";
?>

<?php ob_start(); ?>
<h2>Liste des clients</h2>
<div class="container">
    <div class="row">
        <div class="col">
        <table class="table table-bordered table-hover">
        <thead class="table-dark">
                    <tr>
                        <th>user_id</th>
                        <th>name</th>
                        <th>email</th>
                        <th>numero</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($users as $user): ?>
                    <tr>
                        <td><?= $user->id ?></td>
                        <td><?= $user->name ?></td>
                        <td><?= $user->email ?></td>
                        <td><?= $user->numero ?></td>
                       <td>
                        <a href="index.php?action=destroyClient&id=<?=$user->id?>" class="btn btn-danger">supprimer</a>
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