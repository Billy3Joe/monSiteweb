<?php 
require_once("./models/MainManager.model.php");

class AdministrateurManager extends MainManager {

    
    //Fonction pour récupérer le nombre total des utilisateurs enregistrés sur le site
    public function getNombreUtilisateurs() {
        $req = $this->getBdd()->prepare("SELECT COUNT(*) AS nombre_messages FROM utilisateur");
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result['nombre_utilisateur'];
    }

    //Fonction pour récupérer la liste de tous les utilisateurs enregistrés sur le site
    public function getUtilisateurs() {
        $req = $this->getBdd()->prepare("SELECT * FROM utilisateur");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
    
    //Fonction pour recupérer un utilisateur par son id
    public function getUtilisateurById($id) {
        $req = "SELECT * FROM utilisateur WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $utilisateur = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $utilisateur;
    }

     // Modifier la fonction modifierRoleUtilisateur dans Administrateur.model
    public function modifierRoleUtilisateur($id, $nouveauRole) {
        $req = "UPDATE utilisateur SET role = :nouveauRole WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":nouveauRole", $nouveauRole, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        return $resultat; // Retourner le résultat de l'exécution de la requête
    }
     
    //Fonction pour recupérer le nombre total des messages reçuspar les utilisateurs
    public function getNombreMessages() {
        $req = $this->getBdd()->prepare("SELECT COUNT(*) AS nombre_messages FROM contact");
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result['nombre_messages'];
    }

    

}
