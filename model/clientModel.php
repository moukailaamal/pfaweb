<?php
require_once "connexionBD.php";
require_once "model/produitModel.php";

class Client
{
    private $db;
    private $produitModel;
    public  function __construct()
    {
        $this->db = Database::getConnection();
        $this->produitModel = new Produit();
    }

    // Connectee au compte
    public function loginClient()
    {
        $email = $_POST['email'];
        $password = $_POST['password'];

        // Requête pour vérifier les identifiants de l'utilisateur
        $sql = "SELECT * FROM CLIENT WHERE email=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$email]);
        $resultat = $stmt->fetch(PDO::FETCH_OBJ);

        if ($resultat && password_verify($password, $resultat->password)) {
            // L'utilisateur est authentifié, démarrez la session et stockez l'identifiant
            session_start();
            $_SESSION['user_id'] = $resultat->id;
            $_SESSION['role'] = 'client';

            return true;
        } else {
            // L'authentification a échoué
            return false;
        }
    }

    public function logoutClient()
    {
        // Détruire la session
        session_destroy();
    }

    public function registerClient()
    {
        $email = $_POST['email'];
        $name = $_POST['name'];
        $adresse = $_POST['adresse'];
        $password = $_POST['password'];
        $numero = $_POST['numero'];
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Utiliser bcrypt pour le hachage

        $sql = "INSERT INTO CLIENT (id, name, email, adresse, password, numero) 
        VALUES (null, ?, ?, ?, ?, ?)";
        $stmt = $this->db->prepare($sql);
        $resultat = $stmt->execute([$name, $email, $adresse, $hashedPassword, $numero]);
        return $resultat > 0;
    }


    public function indexAllCommandClient()
    {
        $id = $_GET['id'];
        $sql = "SELECT * FROM COMMAND WHERE user_id=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $resultat = $stmt->fetchAll(PDO::FETCH_OBJ);
        return $resultat;
    }

    public function indexInformationClient()
    {
        // Vérifie si la session est déjà démarrée
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }

        // Vérifie si la clé 'user_id' est définie dans $_SESSION
        $id = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;

        // Vérifie si $id est défini (la clé 'user_id' existe dans $_SESSION)
        if ($id !== null) {
            // Prépare et exécute la requête SQL pour récupérer les informations du client
            $sql = "SELECT * FROM CLIENT WHERE id=?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);

            // Récupère le résultat de la requête sous forme d'objet
            $resultat = $stmt->fetch(PDO::FETCH_OBJ);

            // Retourne le résultat
            return $resultat;
        }

        // Si la clé 'user_id' n'est pas définie, retourne null (ou une autre valeur par défaut)
        return null;
    }

    // modifier les informations 
    public function updateInformationClient()
    {
        $id = $_GET['id'];
        $adresse = $_POST['adresse'];
        $numero = $_POST['numero'];
        $name = $_POST['name'];
        $email = $_POST['email'];

        // Vérifier si le champ de mot de passe est vide
        $password = isset($_POST['password']) ? $_POST['password'] : null;
        $hashedPassword = $password ? password_hash($password, PASSWORD_DEFAULT) : null;

        $sql = "UPDATE CLIENT SET EMAIL=?, ADRESSE=?, NUMERO=?, NAME=? where id=?";
        $params = [$email, $adresse, $numero, $name, $id];

        // Ajouter le mot de passe à la requête s'il n'est pas vide
        if ($hashedPassword) {
            $sql .= ", Password=?";
            $params[] = $hashedPassword;
        }

        $stmt = $this->db->prepare($sql);
        $stmt->execute($params);

        // Vérifiez s'il y a eu une mise à jour réussie
        return $stmt->rowCount() > 0;
    }


    // Méthode pour passer une nouvelle commande
    public function passerCommand()
    {
        // Vérifie si le panier n'est pas vide dans la session
        if ($_SESSION['panier'] !== []) {
            // Récupère les données nécessaires de la requête POST et de la session
            $adresse = $_POST['adresse'];
            $numero = $_POST['numero'];
            $user_id = $_SESSION['user_id'];
            $contenu = $_SESSION['panier'];

            // Vérifie que le contenu du panier n'est pas null
            if ($contenu != null) {
                // Prépare et exécute la requête SQL pour insérer la commande dans la base de données
                $sql = "INSERT INTO COMMAND (statut, adresse, numero, user_id, contenu) VALUES ('en cours', ?, ?, ?, ?)";
                $stmt = $this->db->prepare($sql);
                $resultat = $stmt->execute([$adresse, $numero, $user_id, json_encode($contenu)]);

                // Supprime le panier de la session après avoir passé la commande
                unset($_SESSION['panier']);

                // Appelle la fonction pour diminuer la quantité de stock des produits
                $this->produitModel->quantiteDeStock($contenu);

                // Retourne le résultat de l'exécution de la requête
                return $resultat;
            }
        }
        // Retourne false si le panier est vide ou si le contenu est null
        return false;
    }



    // Méthode pour annuler une commande
    public function annulerCommand()
    {
        $id = $_GET['id'];
        $sql = "UPDATE `command` SET statut='annuler' WHERE id=? AND statut='en cours'";
        $resultat = $this->db->prepare($sql);
        $resultat->execute([$id]);
        return $resultat;
    }
    // activer le commande
    public function activerCommand()
    {
        $id = $_GET['id'];
        $sql = "UPDATE `command` SET statut='en cours' WHERE id=? AND statut='annuler'";
        $resultat = $this->db->prepare($sql);
        $resultat->execute([$id]);
        return $resultat;
    }
}
