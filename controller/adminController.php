<?php
require_once "model/adminModel.php";
require_once "model/clientModel.php";

class AdminController
{
    private $adminModel;

    public function __construct()
    {
        $this->adminModel = new Admin();
    }


    public function loginFormActionAdmin()
    {
        require_once "views/loginAdmin.php";
    }
    public function loginActionAdmin()
    {
       
        $resultat = $this->adminModel->loginAdmin();
       if($resultat){
        header("location:index.php?action=home");
       }else{
        header("location:index.php?action=loginFormAdmin");
       }
        
    }
    public function registerFormActionAdmin()
    {
        require_once "views/registerAdmin.php";
    }
    public function registerActionAdmin()
    {
        $resultat = $this->adminModel->registerAdmin();
        if ($resultat) {
            header("location:index.php?action=indexAllAdmins");
        } else {
            header("location:index.php?action=registerFormAdmin");
        }
    }
    public function indexAllAdminAction()
    {
        $admins = $this->adminModel->indexAllAdmin();
        require_once "views/listAdmin.php";
    }
    public function deleteActionAdmin()
    {
        $admin = $this->adminModel->indexInformationAdmin();
        require_once "views/deleteAdmin.php";
    }
    public function destroyActionAdmin()
    {
        $resultat =$this->adminModel->destroyAdmin();
        header('location:index.php?action=indexAllAdmins');
    }
    public function updateStatutActionAdmin()
    {
        $resultat = $this->adminModel->updateStatut();
        header('location:index.php?action=indexAllCommandAdmin');
    }
    public function indexAllCommandActionAdmin()
    {
        $resultat = $this->adminModel->indexAllCommandClients();
        header("location:index.php?action=listCommandAdmin");
    }
    public function indexAllClientsAction()
    {
        $users = $this->adminModel->indexAllClients();
        require_once "views/listClients.php";
    }

    public function destroyActionClient()
    {
        $resultat = $this->adminModel->destroyClient();
        header("location:index.php?action=indexAllClients");
    }
}
