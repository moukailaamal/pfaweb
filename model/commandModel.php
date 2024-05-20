<?php
require_once "connexionBD.php";

class Command {
    private  $db;

    public   function __construct() {
        $this->db = Database::getConnection();
    }

// Méthode pour récupérer une commande par son ID
public function indexCommand() {
    $id = $_GET['id'];
    $sql = "SELECT * FROM COMMAND WHERE id=?";
    $resultat =  $this->db->prepare($sql);
    $resultat->execute([$id]);
    return $resultat->fetch(PDO::FETCH_OBJ);
}



// Méthode pour calculer le prix total de la commande
public function getPrixTotal() {
    $id = $_GET['id'];

    $sql = "SELECT contenu FROM Command WHERE id=?";
    $resultat =  $this->db->prepare($sql);
    $resultat->execute([$id]);
    $row = $resultat->fetch(PDO::FETCH_OBJ);

    $contenu = json_decode($row->contenu, true); // Convertir la chaîne JSON en tableau associatif
    $total = 0;
    foreach ($contenu as $item) {
        // Ajouter le prix unitaire multiplié par la quantité à $total
        $total += $item['prix'] * $item['quantite'];
    }
    return $total;
}

// Méthode pour afficher le contenu d'une commande
public function indexContenuCommand() {
    $id = $_GET['id'];

    $sql = "SELECT contenu FROM COMMAND WHERE id=?";
    $resultat =  $this->db->prepare($sql);
    $resultat->execute([$id]);
    $row = $resultat->fetch(PDO::FETCH_OBJ);

    $contenus = json_decode($row->contenu, true); // Convertir la chaîne JSON en tableau associatif
    return $contenus;
}

public function indexAllCommand() {

    $sql = "SELECT * FROM COMMAND";
    $resultat =  $this->db->query($sql);
    return $resultat->fetchAll(PDO::FETCH_OBJ);
}
}