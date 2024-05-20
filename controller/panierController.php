<?php
require_once "model/panierModel.php";

class PanierController {
   
    private $panierModel;

    public function __construct() {
        $this->panierModel = new Panier();

    }
function indexActionPanier(){
    $resultat=$this->panierModel->indexPanier();
}

function ajouterActionPanier(){
    $resultat=$this->panierModel->ajouterProduit();
    header("location:index.php?action=home");
}

function prixTotalActionPanier(){
    $prixTotal=$this->panierModel->getPrixTotalPanier();
    header("location:index.php?action=home");

}

function destroyProduitActionPanier(){
    $resultat=$this->panierModel->destroyProduitPanier();
    header("location:index.php?action=home");

}

function augmenterQuantiteActionPanier(){
    $resultat=$this->panierModel->augmenterQuantite();
    header("location:index.php?action=home");

}

function diminuerQuantiteActionPanier(){
    $resultat=$this->panierModel->diminuerQuantite();
    header("location:index.php?action=home");

}
}