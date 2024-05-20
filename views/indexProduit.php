<?php
$title = "le produit";
$loggedIn = isset($_SESSION['user_id']);
$client = isset($_SESSION['role']) && $_SESSION['role'] === 'client';
?>
<?php
?>
<?php ob_start(); ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="<?= $produit->image_path ?>" class="card-img" style="width: 100%; height: 450px; border: 2px solid #ddd; border-radius: 10px; box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);" alt="<?= $produit->name ?>">
        </div>
        <div class="col-md-6">
            <h3 class="mt-3 text-primary"><?= $produit->name ?></h3>
            <p class="text-muted"><strong>Stock:</strong> <?= $produit->stock ?></p>
            <p class="text-success"><strong>Prix:</strong> <?= $produit->prix ?> €</p>
            <p><strong>Description:</strong> <?= $produit->description ?></p>

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
<!--afficher les temoignages d'un produit-->
<div class="container">
    <h5 class="text-center">les avis de clients</h5>
    <div class="row">
        <?php foreach ($temoignages as $temoignage) : ?>
            <div class="col-md-4">
                <div class="card mb-4">
                    <div class="card-body">
                        <h5 class="card-title"><?= $temoignage->name ?></h5>
                        <p class="card-text"><?= $temoignage->avis ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<!--ajouter un avis concernant le produit-->

<?php if ($loggedIn && $client) : ?>

    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h5 class="mb-4">partage ton experience avec ce produit</h5>
            <form action="index.php?action=createTemoignge" method="POST">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" class="form-control" value="<?= $user->name ?>" name="name" id="name">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" value="<?= $user->email ?>" name="email" id="email">
                </div>
                <div class="mb-3">
                    <label for="avis" class="form-label">Avis</label>
                    <textarea class="form-control" name="avis" id="avis" cols="10" rows="9"></textarea>
                </div>
                <input type="hidden" name="produit_id" value="<?= $produit->id ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION["user_id"] ?>">
                <input type="hidden" name="image_path" value="<?= $produit->image_path ?>">

                <button type="submit" class="btn btn-primary">Partager</button>
            </form>
        </div>
    </div>


<?php endif; ?>

<?php $content = ob_get_clean(); ?>
<?php require_once "layout.php"; ?>