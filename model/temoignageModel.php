<?php
require_once "connexionBD.php";
class Temoignage {
    private  $db ;

    public   function __construct() {
        $this->db = Database::getConnection();
    }
function createTemoignage(){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $produit_id = $_POST['produit_id'];
    $avis = $_POST['avis'];
    $user_id = $_POST['user_id'];
    $image_path = $_POST['image_path'];

    $sql = "INSERT INTO temoignage (name, email, produit_id, avis, user_id, image_path) VALUES (?, ?, ?, ?, ?, ?)";
    $resultat = $this->db->prepare($sql);
    $resultat->execute([$name, $email, $produit_id, $avis, $user_id, $image_path]);
    return $resultat;
}

// afficher tous les temoignages
function indexAllTemoignages(){
    $sql = "SELECT * FROM TEMOIGNAGE";
    $resultat = $this->db->query($sql);
    return $resultat->fetchAll(PDO::FETCH_OBJ);
}
// afficher tous les temoignages d'un produit  specifique 
function indexTemoignage(){
    $id = $_GET['id'];
    $sql = "SELECT * FROM TEMOIGNAGE where produit_id=$id;";
    $resultat = $this->db->query($sql);
    return $resultat->fetchAll(PDO::FETCH_OBJ);
}

function destroyTemoignage(){
    $id = $_GET['id'];
    $sql = "DELETE FROM TEMOIGNAGE WHERE id=?";
    $resultat = $this->db->prepare($sql);
    $resultat->execute([$id]);
    return $resultat;
}

// afficher tous les temoignagnes d'un utulisateur specifique 
function indexAllTemoignageClients(){
    $id = $_GET['id'];
    $sql = "SELECT * FROM TEMOIGNAGE WHERE user_id=$id";
    $resultat = $this->db->query($sql);
    return $resultat->fetchAll(PDO::FETCH_OBJ);
}
}