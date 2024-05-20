<?php
require_once "model/contactModel.php";

class ContactController {
    private $contactModel;

    public  function __construct() {
        $this->contactModel = new Contact();
    }

public function createContactAction(){
    require_once "views/contactNous.php";
}
public function  storeContactAction()
{
    $resultat=$this->contactModel->ajouterContact();
    header('location:index.php?action=home');
}

public function indexAllContactAction(){
    $contacts=$this->contactModel->indexAllContact();
    require_once "views/listQuestion.php";
}
public function indexContenuAction(){
    $contact=$this->contactModel->verifierRepondreOuiQuestion();
    if($contact){
    require_once "views/indexReponse.php";
    }else{
        header('location:index.php?action=indexAllContact');
   
    }
}



public function repondreQuestionFormAction()
{
    // Vérifier si la question est répondue
    $verifierQuestionRepondu = $this->contactModel->verifierRepondreNonQuestion();
    if ($verifierQuestionRepondu == 1) {
        $contact = $this->contactModel->indexContenuDuReponse();
        require_once "views/repondreQuestion.php";
    } else {
        header('location:index.php?action=indexAllContact');
    }
}

public function repondreQuestionAction(){
    $contact=$this->contactModel->repondreQuestion();
    header('location:index.php?action=indexAllContact');

}
}