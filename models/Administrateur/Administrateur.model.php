<?php 
require_once("./models/MainManager.model.php");

class AdministrateurManager extends MainManager {
    
    //Fonction pour récupérer le nombre total des utilisateurs enregistrés sur le site
    public function getNombreUtilisateurs() {
        $req = $this->getBdd()->prepare("SELECT COUNT(*) AS nombre_utilisateurs FROM utilisateur");
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result['nombre_utilisateurs'];
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
    
     //Fonction pour recupérer le nombre total de services
     public function getNombreServices() {
        $req = $this->getBdd()->prepare("SELECT COUNT(*) AS nombre_services FROM service");
        $req->execute();
        $result = $req->fetch(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $result['nombre_services'];
    }

    //Fonction pour récupérer la liste de tous les services 
    public function getServices() {
        $req = $this->getBdd()->prepare("SELECT * FROM service");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
    
    //Fonction pour recupérer un service par son id
    public function getServiceById($id) {
        $req = "SELECT * FROM service WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $service = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $service;
    }
   
    public function addService($title, $imagePath, $description) {
        // ... votre logique pour ajouter le service à la base de données
        // Assurez-vous que le chemin stocké dans la base de données inclut le préfixe "Assets/images/"
        $query = "INSERT INTO service (title, image, description) VALUES (:title, :image, :description)";
        $stmt = $this->getBdd()->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':image', $imagePath);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

      //Fonction pour récupérer la liste de tous les experiences 
      public function getExperiences() {
        $req = $this->getBdd()->prepare("SELECT * FROM experiences");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

       //Fonction pour recupérer une experience par son id
       public function getExperienceById($id) {
        $req = "SELECT * FROM experiences WHERE id = :id";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $experience = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $experience;
    }
   
    public function addExperience($title, $imagePath, $description, $link_customer) {
        // ... votre logique pour ajouter le service à la base de données
        // Assurez-vous que le chemin stocké dans la base de données inclut le préfixe "Assets/images/"
        $query = "INSERT INTO experiences (title, image, description, link_customer) VALUES (:title, :image, :description, :link_customer)";
        $stmt = $this->getBdd()->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':image', $imagePath);
        $stmt->bindParam(':description', $description);
        $stmt->bindParam(':link_customer', $link_customer);
        $stmt->execute();
    }

     //Fonction pour récupérer la liste de tous les experiences 
     public function getTestimonials() {
        $req = $this->getBdd()->prepare("SELECT * FROM temoignages");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function addTestimony($name, $company, $details, $date_added) {
        try {
            $query = "INSERT INTO temoignages (name, company, details, date) VALUES (:name, :company, :details, :date_added)";
            $stmt = $this->getBdd()->prepare($query);
            $stmt->bindParam(':name', $name);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':details', $details);
            $stmt->bindParam(':date_added', $date_added);
            return $stmt->execute();
            return $stmt->execute();
        } catch (Exception $e) {
            // Gérer l'exception, par exemple, en journalisant l'erreur ou en affichant un message à l'utilisateur
            error_log("Erreur lors de l'ajout du témoignage : " . $e->getMessage());
            return false;  // Indiquer que l'opération a échoué
        }
    }


    public function deleteMessage($idMessage) {
        // Vérifiez si l'identifiant du message est valide
        if (is_numeric($idMessage)) {
            // Préparez la requête SQL pour supprimer le message
            $sql = "DELETE FROM contact WHERE id = :id";

            // Préparez la requête
            $stmt = $this->getBdd()->prepare($sql);

            // Liez les paramètres
            $stmt->bindParam(":id", $idMessage, PDO::PARAM_INT);

            // Exécutez la requête
            $stmt->execute();

            // Vérifiez si la suppression a réussi
            return $stmt->rowCount() > 0;
        }

        // L'identifiant du message n'est pas valide
        return false;
    }

    public function addSolutionWeb($title, $imagePath, $description) {
        // ... votre logique pour ajouter le service à la base de données
        // Assurez-vous que le chemin stocké dans la base de données inclut le préfixe "Assets/images/"
        $query = "INSERT INTO webSolution (title, image, description) VALUES (:title, :image, :description)";
        $stmt = $this->getBdd()->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':image', $imagePath);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

       //Fonction pour récupérer la liste de toutes les solutions web 
       public function getWebSolutions() {
        $req = $this->getBdd()->prepare("SELECT * FROM webSolution");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function addAppMobile($title, $imagePath, $description) {
        // ... votre logique pour ajouter le service à la base de données
        // Assurez-vous que le chemin stocké dans la base de données inclut le préfixe "Assets/images/"
        $query = "INSERT INTO app_mobile (title, image, description) VALUES (:title, :image, :description)";
        $stmt = $this->getBdd()->prepare($query);
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':image', $imagePath);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }

       //Fonction pour récupérer la liste de toutes les applications mobile
       public function getAppMobiles() {
        $req = $this->getBdd()->prepare("SELECT * FROM app_mobile");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
}


