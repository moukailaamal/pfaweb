<?php
require_once "model/categorieModel.php";

class CategoryController {
    private $categoryModel;

    public function __construct() {
        $this->categoryModel = new Category();
    }
public function createActionCategorie()
{
    require_once "views/createCategorie.php";
}

public function storeActionCategorie()
{
    $resultat = $this->categoryModel->createCategorie();
    if ($resultat) {
        header("location:index.php?action=indexAllCategorie");
    }
}

public function editActionCategorie()
{
    $resultat =$this->categoryModel->indexCategorie();
    require_once "views/updateCategorie.php";
}
public function updateActionCategorie()
{
    $resultat = $this->categoryModel->updateCategorie();
    header("location:index.php?action=indexAllCategorie");
}
public function deleteActionCategorie()
{
    $resultat =$this->categoryModel->indexCategorie();
    require_once "views/deleteCategorie.php";
}
public function destroyActionCategorie()
{
    $resultat = $this->categoryModel->destroyCategorie();
    header("location:index.php?action=indexAllCategorie");
}

public function indexAllActionCategorie()
{
    $resultat = $this->categoryModel->indexAllCategorie();
    require_once "views/listeCategorie.php";
}
public function indexActionCategorie()
{
    $resultat = $this->categoryModel->indexCategorie();
}
function createActionProduit()
{
    $categories = $this->categoryModel->indexAllCategorie();
    require_once "views/createProduit.php";
}
}