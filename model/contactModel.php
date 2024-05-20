<?php
require_once "connexionBD.php";

class Contact {
    private $db;

    public  function __construct() {
        $this->db = Database::getConnection();
    }

// ajouter un contact
public function ajouterContact(){
    $name=$_POST['name'];
    $email=$_POST['email'];
    $sujet=$_POST['sujet'];

    $sql = "INSERT INTO CONTACT (name, email, sujet,repondu) VALUES (?, ?, ?,'non')";
    $stmt = $this->db->prepare($sql);
    $resultat = $stmt->execute([$name, $email, $sujet]);
    return $resultat;
}

public function indexAllContact()
{
    $sql = "SELECT * FROM CONTACT";
    $resultat = $this->db->query($sql);
    return $resultat->fetchAll(PDO::FETCH_OBJ);
}

public function verifierRepondreOuiQuestion(){
    $id=$_GET['id'];
    $sql = "SELECT * FROM CONTACT where id=? AND repondu='oui'";
    $resultat = $this->db->prepare($sql);
    $resultat->execute([$id]);
    return $resultat->fetch(PDO::FETCH_OBJ);
}

public function verifierRepondreNonQuestion()
{
     $id = $_GET['id'];
    // Vérifier si la question n'a pas été répondue
    $sqlVerifier = "SELECT * FROM CONTACT WHERE id=? AND repondu='non'";
    $resultatVerifier = $this->db->prepare($sqlVerifier);
    $resultatVerifier->execute([$id]);
    return $resultatVerifier->rowCount();
}

public function repondreQuestion(){
    $id=$_GET['id'];
    $reponse=$_POST['reponse'];

    // Mettre à jour la question avec la réponse
    $sqlUpdate = "UPDATE contact SET repondu='oui', reponse=? WHERE id=?";
    $resultatUpdate = $this->db->prepare($sqlUpdate);
    $resultatUpdate->execute([$reponse, $id]); 

    return $resultatUpdate->rowCount(); // Retourne le nombre de lignes modifiées
}


public function indexContenuDuReponse(){
    $id=$_GET['id'];
    $sql = "SELECT * FROM CONTACT where id=? ";
    $resultat = $this->db->prepare($sql);
    $resultat->execute([$id]);
    return $resultat->fetch(PDO::FETCH_OBJ); 
}
}