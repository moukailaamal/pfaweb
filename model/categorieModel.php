<?php
require_once "connexionBD.php";
class Category {
    private $db;

    public function __construct() {
        $this->db = Database::getConnection();
    }

public function indexAllCategorie() {
    $sql = "SELECT * FROM CATEGORIE";
    $resultat =  $this->db->query($sql);
    return $resultat->fetchAll(PDO::FETCH_OBJ);
}

public function indexCategorie() {
    $id = $_GET['id'];
    $sql = "SELECT * FROM CATEGORIE WHERE id=?";
    $resultat =  $this->db->prepare($sql);
    $resultat->execute([$id]);
    return $resultat->fetch(PDO::FETCH_OBJ);
}

public function createCategorie() {
    $name = $_POST['name'];
    $sql = "INSERT INTO CATEGORIE (ID, NAME) VALUES (null, ?)";
    $resultat =  $this->db->prepare($sql);
    $resultat->execute([$name]);
    return $resultat;
}

public function updateCategorie() {
    $id = $_GET['id'];
    $name = $_POST['name'];
    $sql = "UPDATE CATEGORIE SET NAME=? WHERE id=?";
    $resultat =  $this->db->prepare($sql);
    $resultat->execute([$name, $id]);
    return $resultat;
}

public function destroyCategorie() {
    $id = $_GET['id'];
    $sqlProduit= "DELETE FROM Produit WHERE CATEGORIE_ID=?";
    $sqlCategorie= "DELETE FROM CATEGORIE WHERE id=?";
    
    $resultatProduit =  $this->db->prepare($sqlProduit);
    $resultatCategorie =  $this->db->prepare($sqlCategorie);

    $resultatProduit->execute([$id]);
    $resultatCategorie->execute([$id]);

    return $resultatCategorie;
}
}