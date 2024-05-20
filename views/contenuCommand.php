<?php $title = "Contenu de Commande"; ?>

<?php ob_start(); ?>
<div class="container">
    <h2>Le contenu de ma commande</h2>
    
    <div class="row">
        <div class="col">
            <table class="table table-bordered table-hover">
                <thead class="table-dark">
                    <tr>
                        <th class="text-center">Le produit</th>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Quantité</th>
                        <th class="text-center">Prix unitaire</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($contenus as $contenu) : ?>
                        <tr>
                            <td><img src="<?= $contenu['image_path'] ?>" style="max-width: 100%; height: 100px;" alt="Image du produit"></td>
                            <td class="text-center"><?= $contenu['name'] ?></td>
                            <td class="text-center"><?= $contenu['quantite'] ?></td>
                            <td class="text-center"><?= $contenu['prix'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-end"><strong>Total :</strong></td>
                        <td class="text-center"><strong><?= $prixTotal ?>dt</strong></td>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

<?php $content = ob_get_clean(); ?>
<?php
require_once "layout.php";
?>