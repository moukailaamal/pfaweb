<?php
require_once "model/produitModel.php";
require_once "model/categorieModel.php";
require_once "model/clientModel.php";
require_once "model/temoignageModel.php";
class ProduitController {
    private $produitModel;
    private $categorieModel;
    private $temoignageModel;
    private $clientModel;

    public function __construct() {
        $this->produitModel = new Produit();
        $this->categorieModel = new Category();
        $this->temoignageModel = new Temoignage();
        $this->clientModel = new Client();

    }
    function createActionProduit()
    {
        $categories = $this->categorieModel->indexAllCategorie(); 
        require_once "views/createProduit.php";
    }
function storeActionProduit()
{
    $resultat =$this->produitModel->createProduit();
    if ($resultat) {
        header("location:index.php?action=indexAllProduit");
    }
}

function editActionProduit()
{
    $categories = $this->categorieModel->indexAllCategorie();
    $resultat = $this->produitModel->indexProduit();
    require_once "views/updateProduit.php";
}
function updateProduitAction()
{
    $resultat=$this->produitModel->updateProduit();
    header("location:index.php?action=indexAllProduit");
}

function deleteActionProduit()
{
    $resultat =$this->produitModel->indexProduit();
    require_once "views/deleteProduit.php";
}
// supprimer et retourne a la page listeProduits
function destroyActionProduit()
{
    $resultat = $this->produitModel->destroyProduit();
    header("location:index.php?action=indexAllProduit");
}
// tous les produits
function indexAllActionProduit()
{
    $resultat = $this->produitModel->indexAllProduit();
    require_once "views/listeProduit.php";
}
// affiche une seul produit et le temoignage si elle est connecter 
function indexActionProduit()
{
    //pour afficher le produit par id
    $produit = $this->produitModel->indexProduit();
    // pour afficher les temoignage d'un produit specifique
    $temoignages = $this->temoignageModel->indexTemoignage();
    //pour ajouter un temoignage 
    $user = $this->clientModel->indexInformationClient();
    require_once "views/indexProduit.php";
}


// home
function homeAction()
{
    $categories = $this->categorieModel->indexAllCategorie();
    $produits = $this->produitModel->indexAllProduit();
    require_once "views/home.php";
}
}