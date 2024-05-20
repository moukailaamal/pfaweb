<?php

require_once "controller/categorieController.php";
require_once "controller/produitController.php";
require_once "controller/clientController.php";
require_once "controller/adminController.php";
require_once "controller/panierController.php";
require_once "controller/commandController.php";
require_once "controller/contactController.php";
require_once "controller/temoignageController.php";


// Récupérer l'action à effectuer depuis l'URL
$action = $_GET['action'] ?? '';

// Instancier les contrôleurs nécessaires
$categorieController = new CategoryController();
$produitController = new ProduitController();
$clientController = new ClientController();
$adminController = new AdminController();
$panierController = new PanierController();
$commandController = new CommandController();
$contactController = new ContactController();
$temoignageController = new TemoignageController();
// Appeler la fonction appropriée en fonction de l'action
switch ($action) {
        // Categorie
    case 'createCategorie':
        $categorieController->createActionCategorie();
        break;
    case 'storeCategorie':
        $categorieController->storeActionCategorie();
        break;
    case 'editCategorie':
        $categorieController->editActionCategorie();
        break;
    case 'indexCategorie':
        $categorieController->indexActionCategorie();
        break;
    case 'editCategorie':
        $categorieController->editActionCategorie();
        break;
    case 'deleteCategorie':
        $categorieController->deleteActionCategorie();
        break;
    case 'destroyCategorie':
        $categorieController->destroyActionCategorie();
        break;
    case 'indexAllCategorie':
        $categorieController->indexAllActionCategorie();
        break;
    case 'updateCategorie':
        $categorieController->updateActionCategorie();
        break;

        // Produit 
    case 'createProduit':
        $produitController->createActionProduit();
        break;
    case 'storeProduit':
        $produitController->storeActionProduit();
        break;
    case 'updateProduit':
        $produitController->updateProduitAction();
        break;
    case 'editProduit':
        $produitController->editActionProduit();
        break;
    case 'deleteProduit':
        $produitController->deleteActionProduit();
        break;
    case 'destroyProduit':
        $produitController->destroyActionProduit();
        break;
    case 'indexAllProduit':
        $produitController->indexAllActionProduit();
        break;
    case 'indexProduit':
        $produitController->indexActionProduit();
        break;
        // temoignage 
    case 'createTemoignge':
        $temoignageController->createTemoignageAction();
        break;
    case 'listeTemoignageAdmin':
        $temoignageController->indexAllTemoignageAction();
        break;
    case 'listeTemoignageClient':
        $temoignageController->indexAllTemoignageActionClient();
        break;
    case 'destroyTemoignageClient':
        $temoignageController->destroyTemoignageActionClient();
        break;

        // client 
    case 'loginFormClient':
        $clientController->loginFormActionClient();
        break;
    case 'loginClient':
        $clientController->loginActionClient();
        break;
    case 'registerForm':
        $clientController->registerFormActionClient();
        break;
    case 'registerClient':
        $clientController->registerActionClient();
        break;
    case 'logout':
        $clientController->logoutActionClient();
        break;
    case 'listCommandClient':
        $clientController->indexAllCommandActionClient();
        break;
    case 'annulerCommand':
        $clientController->annulerActionCommand();
        break;
    case 'activerCommand':
        $clientController->activerActionCommand();
        break;
    case 'profile':
        $clientController->indexInformationActionClient();
        break;
    case 'editProfile':
        $clientController->editeInformationActionClient();
        break;
    case 'updateProfile':
        $clientController->updateInformationActionClient();
        break;
    case 'passerCommandForm':
        $clientController->passerCommandFormAction();
        break;
    case 'passerCommand':
        $clientController->passerCommandActionClient();
        break;
    case 'contenuCommand':
        $commandController->indexContenuActionCommand();
        break;

        // home
    case 'home':
        $produitController->homeAction();
        break;

        // panier
    case 'indexPanier':
        $panierController->indexActionPanier();
        break;
    case 'ajouterPanier':
        $panierController->ajouterActionPanier();
        break;
    case 'prixTotalPanier':
        $panierController->prixTotalActionPanier();
        break;
    case 'destroyProduitPanier':
        $panierController->destroyProduitActionPanier();
        break;
    case 'augmenterQuantitePanier':
        $panierController->augmenterQuantiteActionPanier();
        break;
    case 'diminuerQuantitePanier':
        $panierController->diminuerQuantiteActionPanier();
        break;

        // admin 
    case 'registerFormAdmin':
        $adminController->registerFormActionAdmin();
        break;
    case 'registerAdmin':
        $adminController->registerActionAdmin();
        break;
    case 'loginFormAdmin':
        $adminController->loginFormActionAdmin();
        break;
    case 'loginAdmin':
        $adminController->loginActionAdmin();
        break;
    case 'indexAllCommandAdmin':
        $commandController->indexActionCommand();
        break;
    case 'indexAllClients':
        $adminController->indexAllClientsAction();
        break;
    case 'indexAllAdmins':
        $adminController->indexAllAdminAction();
        break;
    case 'destroyTemoignageAdmin':
        $temoignageController->destroyTemoignageActionAdmin();
        break;
   
    case 'destroyClient':
        $adminController->destroyActionClient();
        break;
    case 'deleteAdmin':
        $adminController->deleteActionAdmin();
        break;
    case 'destroyAdmin':
        $adminController->destroyActionAdmin();
        break;
    case 'updateStatutAdmin':
        $adminController->updateStatutActionAdmin();
        break;
        
        // question 
    case 'ajouterContact':
        $contactController->storeContactAction();
        break;
    case 'contacteForm':
        $contactController->createContactAction();
        break;
    case 'indexAllContact':
        $contactController->indexAllContactAction();
        break;
    case 'indexReponse':
        $contactController->indexContenuAction();
        break;

    case 'repondreQuestionForm':
        $contactController->repondreQuestionFormAction();
        break;
    case 'repondreQuestion':
        $contactController->repondreQuestionAction();
        break;
    default:
        // Action par défaut si aucune correspondance n'est trouvée
        echo "Action non valide";
        break;
}
