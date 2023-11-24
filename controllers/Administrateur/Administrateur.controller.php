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
      
    public function pageErreur($msg){
        parent::pageErreur($msg);
    }
}
