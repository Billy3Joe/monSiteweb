<?php
require_once("./models/MainManager.model.php");

class VisiteurManager extends MainManager {
    
    public function processContactForm() {
        try {
            // Assurez-vous que la connexion à la base de données est établie
            $db = $this->getBdd();

            if (isset($_POST['ok'])) {
                $name = $_POST['name'];
                $email = $_POST['email'];
                $phone = $_POST['phone'];
                $message = $_POST['message'];

                // Vérifier si les champs obligatoires ont été remplis
                if (empty($name) || empty($email) || empty($message)) {
                    throw new Exception("Veuillez remplir tous les champs obligatoires.");
                } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    throw new Exception("L'adresse email n'est pas valide.");
                } else {
                    // Modifier la structure de la table pour accepter des chaînes de caractères plus longues dans la colonne 'phone' si nécessaire
                    $stmt = $db->prepare("INSERT INTO contact(name, email, phone, message) VALUES (:name, :email, :phone, :message)");
                    $stmt->execute(array(
                        ':name' => $name,
                        ':email' => $email,
                        ':phone' => $phone,
                        ':message' => $message
                    ));
                    
                    // Message de confirmation à afficher dans le pop-up
                    $confirmationMessage = "Votre message a bien été envoyé. Nous vous contacterons bientôt.";

                    // Affichage du pop-up côté client avec JavaScript
                    echo '<script type="text/javascript">alert("' . $confirmationMessage . '");</script>';
                }
            }
        } catch (Exception $e) {
            echo '<div class="error-message">' . $e->getMessage() . '</div>';
        }
    }

    //Fonction pour récupérer la liste de tous les utilisateurs enregistrés sur le site
    public function getServices() {
        $req = $this->getBdd()->prepare("SELECT * FROM service");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function getTestimonials() {
        $req = $this->getBdd()->prepare("SELECT * FROM temoignages");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }

    public function getExperiences() {
        $req = $this->getBdd()->prepare("SELECT * FROM experiences");
        $req->execute();
        $datas = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        return $datas;
    }
}

// Créer une instance de VisiteurManager
$visiteurManager = new VisiteurManager();
// Appel de la méthode pour traiter le formulaire de contact
$visiteurManager->processContactForm();
?>
