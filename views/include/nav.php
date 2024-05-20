<?php 
 $loggedIn = isset($_SESSION['user_id']);
 $admin = isset($_SESSION['role']) && $_SESSION['role'] === 'admin';
 $client = isset($_SESSION['role']) && $_SESSION['role'] === 'client';
 ?>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <!-- Image and text -->

    <a class="navbar-brand" href="index.php?action=home">
        <img src="images/logo.png" width="30" height="30" class="d-inline-block align-top" alt="">
        QuickShop
    </a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="index.php?action=home">
                    <i class="bi bi-house-door"></i> Accueil </a>
            </li>
            <?php if ($loggedIn && $admin) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=indexAllCategorie">Categorie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=indexAllProduit">Produit</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=indexAllClients">Listes des clients</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=indexAllCommandAdmin">Listes des commandes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=listeTemoignageAdmin">Liste de temoignage</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=indexAllAdmins">Liste des admin</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=indexAllContact">Repondre au question</a>
                </li>
            <?php endif; ?>
            <?php if (!$admin) : ?>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=contacteForm">Contactez-Nous</a>
                </li>
            <?php endif; ?>

        </ul>

        <ul class="navbar-nav ms-auto"> <!-- Utilisation de la classe ms-auto pour aligner les liens à droite -->
            <?php if ($loggedIn && $client) : ?>

                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=profile&id=<?= $_SESSION['user_id'] ?>">
                        <i class="bi bi-person-fill"></i> Mon profil
                    </a>
                </li>
            <?php endif; ?>
            <?php if (!$loggedIn) : ?>

                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#connecter">
                        <i class="bi bi-cart-fill"></i> Panier
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=registerForm">
                        Register
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=loginFormClient">Login</a>
                </li>
            <?php else : ?>
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" data-bs-target="#panier" href="index.php?action=indexPanier">
                        <i class="bi bi-cart-fill"></i> Panier
                    </a>

                </li>
                <li class="nav-item">
                    <a class="nav-link" href="index.php?action=logout">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </li>
            <?php endif; ?>


        </ul>
    </div>
</nav>
<!--modal de panier-->
<div class="modal fade" id="panier" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="panierLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable"> <!-- Utilisation de modal-dialog-scrollable pour permettre le défilement -->
        <div class="modal-content">
            <div class="modal-header bg-dark text-light"> <!-- Utilisation de classes pour un en-tête de modal coloré -->
                <h5 class="modal-title" id="panierLabel">Mon Panier</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <?php if (empty($_SESSION['panier'])) : ?>
                    <p>Votre panier est vide.</p>
                <?php else : ?>
                    <div class="modal-body">
                        <?php
                        $somme = 0; // Initialise la variable pour la somme
                        foreach ($_SESSION['panier'] as $panier) :
                            $somme += $panier['quantite'] * $panier['prix']; // Calcul de la somme
                        ?>
                            <div class="card mb-3"> <!-- Utilisation de classes pour une carte Bootstrap -->
                                <div class="row g-0">
                                    <div class="col-md-4">
                                        <img src="<?= $panier['image_path'] ?>" class="img-fluid rounded-start" alt="Image du produit"> <!-- Utilisation de img-fluid pour une image responsive -->
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <h5 class="card-title"><?= $panier['name'] ?></h5>
                                            <p class="card-text">Quantité: <?= $panier['quantite'] ?></p>
                                            <p class="card-text">Prix: <?= $panier['prix'] ?> €</p>
                                            <div class="btn-group" role="group" aria-label="Actions">
                                                <a href="index.php?action=diminuerQuantitePanier&id=<?= $panier['produit_id'] ?>"><button type="button" class="btn btn-dark me-1">
                                                        <i class="bi bi-dash-lg"></i></button></a>
                                                <a href="index.php?action=augmenterQuantitePanier&id=<?= $panier['produit_id'] ?>"><button type="button" class="btn btn-dark me-1">
                                                        <i class="bi bi-plus-lg"></i></button></a>
                                                <a href="index.php?action=destroyProduitPanier&id=<?= $panier['produit_id'] ?>"><button type="button" class="btn btn-danger">
                                                        <i class="bi bi-trash-fill"></i></button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        <p class="text-end fw-bold">Total:
                            <span class="text-primary"><?= number_format($somme, 2, ',', ' ') ?> €</span>
                        </p>
                    </div>

                <?php endif; ?>
            </div>

            <div class="modal-footer">
                <button class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                <?php if ($_SESSION['panier'] !== []) : ?>
                    <a href="index.php?action=passerCommandForm">
                        <button class="btn btn-primary">Passer le command</button>
                    </a>
                <?php else : ?>
                    <button class="btn btn-primary" disabled>Passer le command</button>
                <?php endif ?>
            </div>

        </div>
    </div>
</div>
<!--modal pour les utulisateur non connecter-->
<div class="modal fade" id="connecter" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="connecterLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable"> <!-- Utilisation de modal-dialog-scrollable pour permettre le défilement -->
        <div class="modal-content">
            <div class="modal-header bg-dark text-light"> <!-- Utilisation de classes pour un en-tête de modal coloré -->
                <h5 class="modal-title" id="connecterLabel"> Pour passer une commande, veuillez vous connecter à votre compte.
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            </div>

            <div class="modal-footer">
                <a href="index.php?action=registerForm">
                    <button class="btn btn-secondary">S'inscrire</button>
                </a>
                <a href="index.php?action=loginFormClient">
                    <button class="btn btn-primary">Se Connecter</button>
                </a>
            </div>
        </div>
    </div>
</div>