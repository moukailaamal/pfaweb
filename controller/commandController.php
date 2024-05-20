<?php
require_once "model/CommandModel.php";

class CommandController {
    private $commandModel;

    public function __construct() {
        $this->commandModel = new Command();
    }

public function indexActionCommand()
{
    $historiques = $this->commandModel->indexAllCommand();
    require_once "views/listCommandAdmin.php";
}


public function deleteActionCommand()
{
    $resultat =$this->commandModel->indexCommand();
    require_once "views/deleteCommand.php";
}




public function indexContenuActionCommand(){

    $contenus=$this->commandModel->indexContenuCommand();
    $prixTotal=$this->commandModel->getPrixTotal();
    require_once "views/contenuCommand.php";
}
}