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

      //Fonction pour recupérer le nombre total des messages reçuspar les utilisateurs
      public function getNombreUtilisateur() {
        $req = $this->getBdd()->prepare("SELECT COUNT(*) AS nombre_utilisateurs FROM utilisateur");
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result['nombre_utilisateurs'];
    }
    
    //Fonction pour modifier le rôle d'un utilisateur
    public function modifierRoleUtilisateur($id, $nouveauRole) {
        $req = "UPDATE utilisateur SET role = :nouveauRole WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":nouveauRole", $nouveauRole, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        return $resultat; // Retourner le résultat de l'exécution de la requête
    }

    //Fonction pour modifier la validité d'un utilisateur
    public function toggleUserStatus($userId)
    {
        // Votre logique pour activer/désactiver l'utilisateur dans la base de données
        $query = "UPDATE utilisateur SET est_valide = CASE WHEN est_valide = 0 THEN 1 ELSE 0 END WHERE id = :userId";
        $stmt = $this->getBdd()->prepare($query);
        $stmt->bindValue(":userId", $userId, PDO::PARAM_INT);
        $stmt->execute();
    
        return $stmt->rowCount() > 0;
    }

     //Fonction pour récupérer la liste de tous les utilisateurs enregistrés sur le site
     public function getMessages() {
        $req = $this->getBdd()->prepare("SELECT * FROM contact");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
    
    //Fonction pour recupérer le nombre total des messages envoyés par les utilisateurs
    public function getNombreMessages() {
        $req = $this->getBdd()->prepare("SELECT COUNT(*) AS nombre_messages FROM contact");
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result['nombre_messages'];
    }

}
