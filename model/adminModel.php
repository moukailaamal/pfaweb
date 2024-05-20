<?php
require_once "connexionBD.php";
class Admin {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }
public function loginAdmin()
{
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Requête pour vérifier les identifiants de l'utilisateur
    $sql = "SELECT * FROM administrateur WHERE email=?";
    $stmt =   $this->db->prepare($sql);
    $stmt->execute([$email]);
    $resultat = $stmt->fetch(PDO::FETCH_OBJ);

    if ($resultat && password_verify($password, $resultat->password)) {
        // L'utilisateur est authentifié, démarrez la session et stockez l'identifiant
        session_start();
        $_SESSION['user_id'] = $resultat->id;
        $_SESSION['role'] = 'admin';
        $_SESSION['superAdmin'] = $resultat->superAdmin;

        return true;
    } else {
        // L'authentification a échoué
        return false;
    }
}

public function logout()
{
    // Détruire la session
    session_destroy();
}

public function registerAdmin()
{
    $email = $_POST['email'];
    $name = $_POST['name'];
    $adresse = $_POST['adresse'];
    $password = $_POST['password'];
    $numero = $_POST['numero'];
    $superAdmin = $_POST['superAdmin'] === 'true' ? 1 : 0; // Convertit 'true' en 1 et 'false' en 0
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Utiliser bcrypt pour le hachage

    $sql = "INSERT INTO administrateur (id, name, email, adresse, password, numero,superAdmin) 
    VALUES (null, ?, ?, ?, ?, ?,?)";
    $stmt =   $this->db->prepare($sql);
    $resultat = $stmt->execute([$name, $email, $adresse, $hashedPassword, $numero, $superAdmin]);
    return $resultat > 0;
}
public function indexAllAdmin()
{
    $sql = "SELECT * FROM administrateur";
    $resultat =   $this->db->query($sql);
    return $resultat->fetchAll(PDO::FETCH_OBJ);
}
public function destroyAdmin()
{
    $id = $_GET['id'];
    $sql = "DELETE FROM administrateur WHERE id=?";
    $resultat =   $this->db->prepare($sql);
    $resultat->execute([$id]);
    return $resultat;
}
public function indexInformationAdmin()
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM administrateur where id=$id";
    $resultat =   $this->db->query($sql);
    return $resultat->fetch(PDO::FETCH_OBJ);
}
public function updateStatut()
{
    $id = $_GET['id'];
    $sql = "UPDATE COMMAND SET statut ='confirmer' WHERE id=?AND statut='en cours'";
    $resultat =   $this->db->prepare($sql);
    $resultat->execute([$id]);
    return $resultat;
}
// Méthode pour récupérer toutes les commandes
public function indexAllCommandClients()
{
    $sql = "SELECT * FROM COMMAND";
    $resultat =   $this->db->query($sql);
    return $resultat->fetchAll(PDO::FETCH_OBJ);
}

public function indexAllClients()
{
    $sql = "SELECT * FROM CLIENT";
    $resultat =   $this->db->query($sql);
    return $resultat->fetchAll(PDO::FETCH_OBJ);
}
public function destroyClient()
{
    $id = $_GET['id'];
    $sql = "DELETE FROM CLIENT WHERE id=?";
    $resultat =   $this->db->prepare($sql);
    $resultat->execute([$id]);
    return $resultat;
}
}