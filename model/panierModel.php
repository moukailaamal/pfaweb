<?php

require_once "model/produitModel.php";
class Panier {
    private $produitModel;
    public function __construct() {
        session_start();
        if (!isset($_SESSION['panier'])) {
            $_SESSION['panier'] = [];
        }
    }
    

// Récupère les produits du panier sous forme d'objets
public  function indexPanier() {
    $panierObjets = [];
        foreach ($_SESSION['panier'] as $produit) {
            $panier = new stdClass();
            $panier->produit_id = $produit['produit_id'];
            $panier->quantite = $produit['quantite'];
            $panier->prix = $produit['prix'];  
            $panier->name = $produit['name'];
            $panier->image_path = $produit['image_path'];
            $panierObjets[] = $panier;
        }
        
    return $panierObjets;
}


public  function ajouterProduit() {
    // Récupération des données du produit à ajouter au panier depuis $_POST
    $produit_id = $_POST['id'];
    $prix=$_POST['prix'];
    $image_path=$_POST['image_path'];
    $name=$_POST['name'];
  
   
    // Vérifie si le produit est déjà dans le panier
    $produit_existe = false;
    foreach ($_SESSION['panier'] as &$produit) {
        if ($produit['produit_id'] == $produit_id) {
            $produit_existe = true;
            $produit['quantite'] += 1;
            break;
        }
    }

    // Si le produit n'existe pas dans le panier, l'ajoute avec une quantité de 1
    if (!$produit_existe) {
        $_SESSION['panier'][] = [
            'produit_id' => $produit_id,
            'quantite' => 1,
            'prix' => $prix,
            'image_path'=> $image_path,
           'name'=> $name,

        ];
    }
}

// Calcule le prix total du panier
public  function getPrixTotalPanier() {
   
    $total = 0;
    foreach ($_SESSION['panier'] as $produit) {
        $total += $produit['quantite'] * $produit['prix'];
    }
    return $total;
}

// Supprime un produit du panier
public  function destroyProduitPanier() {
    $produit_id = $_GET['id'] ?? '';
   
    foreach ($_SESSION['panier'] as $key => $produit) {
        if ($produit['produit_id'] === $produit_id) {
            unset($_SESSION['panier'][$key]);
            break;
        }
    }
}

// Augmente la quantité d'un produit dans le panier
public  function augmenterQuantite() {
   
    $produit_id = $_GET['id'] ?? '';
    foreach ($_SESSION['panier'] as &$produit) {
        if ($produit['produit_id'] === $produit_id) {
            $produit['quantite'] += 1;
            break;
        }
    }
}

// Diminue la quantité d'un produit dans le panier
public  function diminuerQuantite() {
    $produit_id = $_GET['id'] ?? '';
   
    //recherche l'index du produit dans le panier en utilisant array_search sur la colonne 'produit_id'
    $key = array_search($produit_id, array_column($_SESSION['panier'], 'produit_id'));
    if ($key !== false) {
        if ($_SESSION['panier'][$key]['quantite'] > 1) {
            $_SESSION['panier'][$key]['quantite'] -= 1;
        } else {
            unset($_SESSION['panier'][$key]);
        }
    }
}
}