<?php
require_once "model/clientModel.php";

class ClientController {
    private $clientModel;

    public function __construct() {
        $this->clientModel = new Client();
      
    }

// login
public  function loginFormActionClient()
{
    require_once "views/loginClient.php";
}
public  function loginActionClient()
{
    $resultat = $this->clientModel->loginClient();
    if($resultat){     
        header('location:index.php?action=home');
    }else{
        header('location:index.php?action=loginFormClient');
    }  
}

// register
public  function registerFormActionClient()
{
    require_once "views/registerClient.php";
}
public  function registerActionClient()
{
    $resultat = $this->clientModel->registerClient();
    if ($resultat) {
        header('location:index.php?action=loginFormClient');
    } else {
        header('location:index.php?action=registerForm');
    }
}

// logout
public  function logoutActionClient()
{
    $resultat = $this->clientModel->logoutClient();
    header("location:index.php?action=home");
}
//passer command
public  function passerCommandFormAction()
{
    require_once "views/passerCommand.php";
}
public  function passerCommandActionClient()
{
    $resultat = $this->clientModel->passerCommand();
    
    header("location:index.php?action=home");
}

// afficher les information de client 
public  function indexAllCommandActionClient()
{
    $historiques = $this->clientModel->indexAllCommandClient();
    require_once "views/listCommandClient.php";
}
public  function indexInformationActionClient()
{
    $resultat = $this->clientModel->indexInformationClient();
    require_once "views/profile.php";
}

// modifier les information de client 
public  function editeInformationActionClient()
{
    $resultat = $this->clientModel->indexInformationClient();
    require_once "views/modifierProfile.php";
}
public  function updateInformationActionClient()
{
    $resultat = $this->clientModel->updateInformationClient();
    header("location:index.php?action=profile");
}


public  function annulerActionCommand() {
    $resultat = $this->clientModel->annulerCommand();
    header('location:index.php?action=profile');
}


public  function activerActionCommand() {
    $resultat = $this->clientModel->activerCommand();
    header('location:index.php?action=profile');
}
}
