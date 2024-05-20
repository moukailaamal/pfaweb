<?php
require_once "connexionBD.php";
class Produit {
    private  $db ;

    public   function __construct() {
        $this->db = Database::getConnection();
       
    }
// Fonction qui affiche tous les Produits
public function indexAllProduit()
{
    $sql = "SELECT * FROM Produit";
    $resultat =  $this->db ->query($sql);
    return $resultat->fetchAll(PDO::FETCH_OBJ);
}

// Fonction qui affiche un produit spécifique
public function indexProduit()
{
    $id = $_GET['id'];
    $sql = "SELECT * FROM Produit WHERE id=$id";
    $resultat =  $this->db ->query($sql);
    return $resultat->fetch(PDO::FETCH_OBJ);
}

// Fonction qui crée une nouvelle produit
public function createProduit()
{
    $name = $_POST['name'];
    $description = $_POST['description'];
    $categorie_id = $_POST['categorie_id'];
    $stock = $_POST['stock'];
    $prix = $_POST['prix'];
    $image_path = null;
    if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'images/'; // Répertoire où enregistrer l'image
        $image_path = $upload_dir . basename($_FILES['image_path']['name']);
        move_uploaded_file($_FILES['image_path']['tmp_name'], $image_path);
    }
    $sql = "INSERT INTO Produit (NAME, DESCRIPTION, CATEGORIE_ID, STOCK, PRIX, IMAGE_PATH) VALUES (?, ?, ?, ?, ?, ?)";
    $resultat =  $this->db ->prepare($sql);
    $resultat->execute([$name, $description, $categorie_id, $stock, $prix, $image_path]);
    return $resultat;
}

public function updateProduit()
{
    $id = $_GET['id'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $categorie_id = $_POST['categorie_id'];
    $stock = $_POST['stock'];
    $prix = $_POST['prix'];
    $image_path = null;

    if (isset($_FILES['image_path']) && $_FILES['image_path']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = 'images/'; // Répertoire où enregistrer l'image
        $image_path = $upload_dir . basename($_FILES['image_path']['name']);
        move_uploaded_file($_FILES['image_path']['tmp_name'], $image_path);
    } else {
        // Aucun fichier n'a été téléchargé, conservez l'image existante
        $sql = "SELECT IMAGE_PATH FROM PRODUIT WHERE ID=?";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([$id]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        $image_path = $row['IMAGE_PATH'];
    }

    $sql = "UPDATE PRODUIT SET NAME=?, DESCRIPTION=?, CATEGORIE_ID=?, STOCK=?, PRIX=?, IMAGE_PATH=? WHERE ID=?";
    $resultat =  $this->db ->prepare($sql);
    $resultat->execute([$name, $description, $categorie_id, $stock, $prix, $image_path, $id]);
    return $resultat;
}



// Fonction qui supprime un produit spécifique
public function destroyProduit()
{
    $id = $_GET['id'];
    $sql = "DELETE FROM PRODUIT WHERE id=?";
    $resultat =  $this->db ->prepare($sql);
    $resultat->execute([$id]);
    return $resultat;
}
public function quantiteDeStock($contenuCommand) {
    foreach ($contenuCommand as $table) {
        if (isset($table['produit_id'])) {
            $idProduit = $table['produit_id'];
            $quantite = $table['quantite'];
            $sql = "UPDATE PRODUIT SET STOCK = STOCK - ? WHERE ID = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$quantite, $idProduit]);
        }
    }
}
}