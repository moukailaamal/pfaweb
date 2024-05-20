<?php
require_once "model/temoignageModel.php";
class TemoignageController {
    private $temoignageModel;
 

    public function __construct() {
        $this->temoignageModel = new Temoignage();
    }

    function createTemoignageAction()
{
    $resultat = $this->temoignageModel->createTemoignage();
    header("location:index.php?action=home");
}
// liste de tous les temoignges
function indexAllTemoignageAction()
{
    $temoignages=$this->temoignageModel->indexAllTemoignages();
    require_once "views/listeTemoignagesAdmin.php";
}
// supprimer un temoignage
function destroyTemoignageActionAdmin(){
    $resultat=$this->temoignageModel->destroyTemoignage();
    header("location:index.php?action=listeTemoignageAdmin");
}

function destroyTemoignageActionClient(){
    $resultat=$this->temoignageModel->destroyTemoignage();
    header("location:index.php?action=profile");
}

function indexAllTemoignageActionClient(){
    $temoignages=$this->temoignageModel->indexAllTemoignageClients();
    require_once "views/listeTemoignagesClient.php";
}
}