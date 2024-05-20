<?php
$title = "home";
?>

<?php ob_start(); ?>
<?php  $loggedIn = isset($_SESSION['user_id']);
?>
<div class="container">
    <?php foreach ($categories as $categorie) : ?>
        <h3><?= $categorie->name ?></h3>
        <div class="row">
            <?php foreach ($produits as $produit) : ?>
                <?php if ($produit->categorie_id === $categorie->id) : ?>
                    <div class="col-3">
                        <div class="card mb-3 h-100">
                            <a href="index.php?action=indexProduit&id=<?= $produit->id ?>"><img src="<?= $produit->image_path ?>" class="card-img" style="width: 100%; height: 400px" alt="<?= $produit->name ?>"></a>
                            <div class="card-body">
                                <h5 class="card-title"><?= $produit->name ?></h5>
                                <p class="card-text"><?= $produit->description ?></p>
                                <p class="card-text">Prix: <?= $produit->prix ?></p>
                                <p class="card-text">Stock: <?= $produit->stock ?></p>
                                <!-- button de panier -->

                                <!-- si l'utilisateur est connecté -->
                                <?php if ($loggedIn) : ?>
                                    <!-- si le produit est en stock -->
                                    <?php if ($produit->stock > 0) : ?>
                                        <form action="index.php?action=ajouterPanier" method="POST">
                                            <input type="hidden" name="id" value="<?= $produit->id ?>">
                                            <input type="hidden" name="name" value="<?= $produit->name ?>">
                                            <input type="hidden" name="prix" value="<?= $produit->prix ?>">
                                            <input type="hidden" name="image_path" value="<?= $produit->image_path ?>">
                                            <button type="submit"><i class="bi bi-cart-fill"></i> Ajouter au panier</button>
                                        </form>
                                        <!-- si le produit n'est pas en stock -->
                                    <?php else : ?>
                                        <button class="bg-danger" type="button" disabled><i class="bi bi-cart-fill"></i> Le produit est hors stock</button>
                                    <?php endif; ?>
                                    <!-- si l'utilisateur n'est pas connecté -->
                                <?php else : ?>
                                    <button class="btn btn-primary  text-white" style="text-decoration: none;" data-bs-toggle="modal" data-bs-target="#connecter">
                                        <i class="bi bi-cart-fill"></i> Ajouter au panier
                                    </button>

                                <?php endif; ?>

                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            <?php endforeach; ?>
        </div>
    <?php endforeach; ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('layout.php'); ?>