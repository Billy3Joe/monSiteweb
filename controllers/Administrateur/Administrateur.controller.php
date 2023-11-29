<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Administrateur/Administrateur.model.php");

class AdministrateurController extends MainController {
    private $administrateurManager;

    public function __construct() {
        $this->administrateurManager = new AdministrateurManager();
    }

    public function dashboard() {
        $utilisateurs = $this->administrateurManager->getUtilisateurs();
        $data_page = [
            "page_description" => "Description de la page du dashboard",
            "page_title" => "Titre de la page du dashboard",
            "utilisateurs" => $utilisateurs,
            "view" => "views/Administrateur/dashboard.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function users() {
        $utilisateurs = $this->administrateurManager->getUtilisateurs();
        $data_page = [
            "page_description" => "Description de la page utilisateur",
            "page_title" => "Titre de la page utilisateur",
            "utilisateurs" => $utilisateurs,
            "view" => "views/Administrateur/users.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function messages() {
        $messages = $this->administrateurManager->getMessages();
        $data_page = [
            "page_description" => "Description de la page message",
            "page_title" => "Titre de la page maessage",
            "messages" => $messages,
            "view" => "views/Administrateur/messages.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function update_data_user($id) {
        // Récupérer l'utilisateur par son ID
        $utilisateur = $this->administrateurManager->getUtilisateurById($id);
    
        // Initialiser $erreur à null
        $erreur = null;
    
        // Vérifier si le formulaire de modification a été soumis
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupérer les données du formulaire
            $nouveauRole = Securite::secureHTML($_POST["role"]);
    
            // Effectuer la mise à jour du rôle
            $estModifie = $this->administrateurManager->modifierRoleUtilisateur($id, $nouveauRole);
    
            // Vérifier si la modification a réussi
            if ($estModifie) {
                // Rediriger vers une page de confirmation ou vers la liste des utilisateurs
                header("Location: " . URL . "dashboard");
                exit();
            } else {
                // La modification a échoué, vous pouvez gérer cela en affichant un message d'erreur
                $erreur = "Échec de la modification du rôle.";
            }
        }
        
        // Préparer les données pour la vue
        $data_page = [
            "page_description" => "Modification des données utilisateur",
            "page_title" => "Gestion des données",
            "utilisateur" => $utilisateur,
            "erreur" => $erreur, // Pas besoin de ?? null ici, car $erreur est toujours défini
            "view" => "views/Administrateur/update_data_user.view.php",
            "template" => "views/common/template.php"
        ];
    
       // Générer la page
       $this->genererPage($data_page);
    }
   

    public function toggleUserStatus($userId){
        // Votre logique pour activer/désactiver l'utilisateur en fonction de $userId
        // Mettez à jour la base de données, par exemple, en utilisant votre modèle
        $success = $this->administrateurManager->toggleUserStatus($userId);
    
        if ($success) {
            // L'utilisateur a été activé/désactivé avec succès
            $confirmationMessage = "L'utilisateur a été activé/désactivé avec succès.";
            header("Location: " . URL . "dashboard?confirmation=" . urlencode($confirmationMessage));
        } else {
            // Une erreur s'est produite
            $errorMessage = "Une erreur s'est produite lors de l'activation/désactivation de l'utilisateur.";
            header("Location: " . URL . "dashboard?error=" . urlencode($errorMessage));
        }
    
        // Assurez-vous de quitter ici pour éviter que d'autres choses ne soient envoyées dans la réponse
        exit;
    }
    
    public function deleteMessageUser($messageId)
    {
        // Effectuez ici la logique de suppression en utilisant votre modèle ou gestionnaire d'administrateurs
        $success = $this->administrateurManager->deleteMessage($messageId);

        // Redirigez vers la page appropriée en fonction du résultat de la suppression
        if ($success) {
            // Message supprimé avec succès
            // Ajoutez un message flash si nécessaire pour afficher un message sur la page de redirection
            $_SESSION['message'] = "Le message a été supprimé avec succès.";
        } else {
            // Échec de la suppression
            // Ajoutez un message flash si nécessaire pour afficher un message sur la page de redirection
            $_SESSION['message'] = "La suppression du message a échoué.";
        }

        // Redirigez vers la page d'où provient l'utilisateur ou une page par défaut si la référence HTTP est indisponible
        $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : URL;
        header("Location: $referer");
        exit;
    }
    
    
    

      
    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}
