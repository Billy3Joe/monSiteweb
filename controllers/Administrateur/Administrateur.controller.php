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
    
    public function services() {
        $services = $this->administrateurManager->getServices();
        $data_page = [
            "page_description" => "Description de la page service",
            "page_title" => "Titre de la page service",
            "services" => $services,
            "view" => "views/Administrateur/services.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }


    public function add_data_service() {
        // Initialiser le message à vide
        $message = "";
    
        // Définissez le chemin vers le dossier d'images
        $uploadDir = "public/Assets/images/";
    
        // Si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $image = $_FILES['image']; // Utilisez $_FILES pour les fichiers
            $description = htmlspecialchars($_POST['description']);
    
            // Traiter l'upload de l'image et obtenir le chemin final
            $imagePath = $this->handleImageUploadService($image);
    
            // Ajoutez le service à la base de données
            $this->administrateurManager->addService($title, $imagePath, $description);
    
            // Définissez le message de confirmation
            $message = "Le service a été ajouté avec succès!";
        }
    
        // Définissez les données de la page
        $data_page = [
            "page_description" => "Description de la page ajout service",
            "page_title" => "Titre de la page ajout service",
            "message" => $message,
            "uploadDir" => $uploadDir,  // Ajoutez cette ligne
            "view" => "views/Administrateur/form_add_service.view.php",
            "template" => "views/common/template.php",
        ];
    
        // Générez la page
        $this->genererPage($data_page);
    }    


    // Fonction pour traiter l'upload de l'image service
    private function handleImageUploadService($image) {
        // Vérifiez s'il y a des erreurs lors de l'upload
        if ($image['error'] !== UPLOAD_ERR_OK) {
            // Gérez l'erreur selon vos besoins
            die("Erreur lors de l'upload de l'image");
        }
    
        // Vérifiez l'extension du fichier
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    
        if (!in_array($imageExtension, $allowedExtensions)) {
            die("L'extension du fichier n'est pas autorisée. Seules les extensions JPG, JPEG, PNG, et GIF sont autorisées.");
        }
    
        // Vérifiez la taille du fichier
        $maxFileSize = 5 * 1024 * 1024; // 5 Mo
        if ($image['size'] > $maxFileSize) {
            die("La taille du fichier dépasse la limite autorisée. La taille maximale autorisée est de 5 Mo.");
        }
    
        // Déplacez le fichier temporaire vers un emplacement permanent
        $uploadDir = "public/Assets/images/services/";
    
        // Vérifiez si le dossier de destination existe, sinon créez-le
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Créez le dossier récursivement avec des permissions élevées (à ajuster selon les besoins)
        }
    
        $imageName = uniqid() . "_" . $image['name'];
        $imagePath = $uploadDir . $imageName;
    
        // Déplacez le fichier
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Utilisez un chemin relatif pour stocker dans la base de données
            $relativeImagePath = "public/Assets/images/services/" . $imageName;
            return $relativeImagePath;
        } else {
            // Gérez l'erreur si le déplacement échoue
            die("Erreur lors du déplacement de l'image vers l'emplacement permanent");
        }
    }

    public function experiences() {
        $experiences = $this->administrateurManager->getExperiences();
        $data_page = [
            "page_description" => "Description de la page service",
            "page_title" => "Titre de la page service",
            "experiences" => $experiences,
            "view" => "views/Administrateur/experiences.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }


    public function add_data_experience() {
        // Initialiser le message à vide
        $message = "";
    
        // Définissez le chemin vers le dossier d'images
        $uploadDir = "public/Assets/images/";
    
        // Si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $image = $_FILES['image']; // Utilisez $_FILES pour les fichiers
            $description = htmlspecialchars($_POST['description']);
            $link_customer = htmlspecialchars($_POST['link_customer']);
    
            // Traiter l'upload de l'image et obtenir le chemin final
            $imagePath = $this->handleImageUploadExperience($image);
    
            // Ajoutez le service à la base de données
            $this->administrateurManager->addExperience($title, $imagePath, $description, $link_customer);
    
            // Définissez le message de confirmation
            $message = "L'expériebnce a été ajouté avec succès!";
        }
    
        // Définissez les données de la page
        $data_page = [
            "page_description" => "Description de la page ajout experience",
            "page_title" => "Titre de la page ajout sexperience",
            "message" => $message,
            "uploadDir" => $uploadDir,  // Ajoutez cette ligne
            "view" => "views/Administrateur/form_add_experience.view.php",
            "template" => "views/common/template.php",
        ];
    
        // Générez la page
        $this->genererPage($data_page);
    }    

     // Fonction pour traiter l'upload de l'image service
     private function handleImageUploadExperience($image) {
        // Vérifiez s'il y a des erreurs lors de l'upload
        if ($image['error'] !== UPLOAD_ERR_OK) {
            // Gérez l'erreur selon vos besoins
            die("Erreur lors de l'upload de l'image");
        }
    
        // Vérifiez l'extension du fichier
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    
        if (!in_array($imageExtension, $allowedExtensions)) {
            die("L'extension du fichier n'est pas autorisée. Seules les extensions JPG, JPEG, PNG, et GIF sont autorisées.");
        }
    
        // Vérifiez la taille du fichier
        $maxFileSize = 5 * 1024 * 1024; // 5 Mo
        if ($image['size'] > $maxFileSize) {
            die("La taille du fichier dépasse la limite autorisée. La taille maximale autorisée est de 5 Mo.");
        }
    
        // Déplacez le fichier temporaire vers un emplacement permanent
        $uploadDir = "public/Assets/images/experiences/";
    
        // Vérifiez si le dossier de destination existe, sinon créez-le
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Créez le dossier récursivement avec des permissions élevées (à ajuster selon les besoins)
        }
    
        $imageName = uniqid() . "_" . $image['name'];
        $imagePath = $uploadDir . $imageName;
    
        // Déplacez le fichier
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Utilisez un chemin relatif pour stocker dans la base de données
            $relativeImagePath = "public/Assets/images/experiences/" . $imageName;
            return $relativeImagePath;
        } else {
            // Gérez l'erreur si le déplacement échoue
            die("Erreur lors du déplacement de l'image vers l'emplacement permanent");
        }
    }

    public function testimonials() {
        $testimonials = $this->administrateurManager->getTestimonials();
        $data_page = [
            "page_description" => "Description de la page avis/témoignages",
            "page_title" => "Titre de la page avis/témoignages",
            "testimonials" => $testimonials,
            "view" => "views/Administrateur/testimonials.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }
    
    
    public function add_data_testimony() {
        // Initialiser le message et les erreurs à vide
        $message = "";
        $errors = [];

        // Si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $name = htmlspecialchars($_POST['name']);
            $company = htmlspecialchars($_POST['company']);
            $details = htmlspecialchars($_POST['details']);

            // Ajoutez la date actuelle (si vous ne voulez pas que l'utilisateur la fournisse)
            $date_added = date("Y-m-d H:i:s");

            // Validez les données (ajoutez des validations appropriées)
            // ...

            // Si aucune erreur, ajoutez le témoignage à la base de données
            if (empty($errors)) {
                $result = $this->administrateurManager->addTestimony($name, $company, $details, $date_added);

                if ($result) {
                    // Définissez le message de confirmation
                    $message = "Le témoignage a été ajouté avec succès!";
                } else {
                    $errors[] = "Une erreur s'est produite lors de l'ajout du témoignage.";
                }
            }
        }

        // Définissez les données de la page
        $data_page = [
            "page_description" => "Description de la page ajout avis/témoignage",
            "page_title" => "Titre de la page ajout avis/témoignage",
            "message" => $message,
            "errors" => $errors,
            "view" => "views/Administrateur/form_add_testimony.view.php",
            "template" => "views/common/template.php",
        ];

        // Générez la page
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

      
    public function pageErreur($msg){
        parent::pageErreur($msg);
    }

    public function webSolutions() {
        $webSolutions = $this->administrateurManager->getWebSolutions();
        $data_page = [
            "page_description" => "Description de la page solution web",
            "page_title" => "Titre de la page solution web",
            "webSolutions" => $webSolutions,
            "view" => "views/Administrateur/webSolutions.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function add_data_webSolutions() {
        // Initialiser le message à vide
        $message = "";
    
        // Définissez le chemin vers le dossier d'images
        $uploadDir = "public/Assets/images/";
    
        // Si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $image = $_FILES['image']; // Utilisez $_FILES pour les fichiers
            $description = htmlspecialchars($_POST['description']);
    
            // Traiter l'upload de l'image et obtenir le chemin final
            $imagePath = $this->handleImageUploadWebSolutions($image);
    
            // Ajoutez le service à la base de données
            $this->administrateurManager->addSolutionWeb($title, $imagePath, $description);
    
            // Définissez le message de confirmation
            $message = "Le solution web a été ajouté avec succès!";
        }
    
        // Définissez les données de la page
        $data_page = [
            "page_description" => "Description de la page ajout solutions web",
            "page_title" => "Titre de la page ajout solutions web",
            "message" => $message,
            "uploadDir" => $uploadDir,  // Ajoutez cette ligne
            "view" => "views/Administrateur/form_add_webSolution.view.php",
            "template" => "views/common/template.php",
        ];
    
        // Générez la page
        $this->genererPage($data_page);
    }    

     // Fonction pour traiter l'upload de l'image service
     private function handleImageUploadWebSolutions($image) {
        // Vérifiez s'il y a des erreurs lors de l'upload
        if ($image['error'] !== UPLOAD_ERR_OK) {
            // Gérez l'erreur selon vos besoins
            die("Erreur lors de l'upload de l'image");
        }
    
        // Vérifiez l'extension du fichier
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    
        if (!in_array($imageExtension, $allowedExtensions)) {
            die("L'extension du fichier n'est pas autorisée. Seules les extensions JPG, JPEG, PNG, et GIF sont autorisées.");
        }
    
        // Vérifiez la taille du fichier
        $maxFileSize = 5 * 1024 * 1024; // 5 Mo
        if ($image['size'] > $maxFileSize) {
            die("La taille du fichier dépasse la limite autorisée. La taille maximale autorisée est de 5 Mo.");
        }
    
        // Déplacez le fichier temporaire vers un emplacement permanent
        $uploadDir = "public/Assets/images/webSolutions/";
    
        // Vérifiez si le dossier de destination existe, sinon créez-le
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Créez le dossier récursivement avec des permissions élevées (à ajuster selon les besoins)
        }
    
        $imageName = uniqid() . "_" . $image['name'];
        $imagePath = $uploadDir . $imageName;
    
        // Déplacez le fichier
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Utilisez un chemin relatif pour stocker dans la base de données
            $relativeImagePath = "public/Assets/images/webSolutions/" . $imageName;
            return $relativeImagePath;
        } else {
            // Gérez l'erreur si le déplacement échoue
            die("Erreur lors du déplacement de l'image vers l'emplacement permanent");
        }
    }

    public function mobileApp() {
        $mobileApps = $this->administrateurManager->getAppMobiles();
        $data_page = [
            "page_description" => "Description de la page application mobile",
            "page_title" => "Titre de la page application",
            "mobileApps" => $mobileApps,
            "view" => "views/Administrateur/appMobile.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function add_data_appMobile() {
        // Initialiser le message à vide
        $message = "";
    
        // Définissez le chemin vers le dossier d'images
        $uploadDir = "public/Assets/images/";
    
        // Si le formulaire est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez les données du formulaire
            $title = htmlspecialchars($_POST['title']);
            $image = $_FILES['image']; // Utilisez $_FILES pour les fichiers
            $description = htmlspecialchars($_POST['description']);
    
            // Traiter l'upload de l'image et obtenir le chemin final
            $imagePath = $this->handleImageUploadAppMobile($image);
    
            // Ajoutez le service à la base de données
            $this->administrateurManager->addAppMobile($title, $imagePath, $description);
    
            // Définissez le message de confirmation
            $message = "L'application mobile' a été ajouté avec succès!";
        }
    
        // Définissez les données de la page
        $data_page = [
            "page_description" => "Description de la page ajout application mobile",
            "page_title" => "Titre de la page ajoutapplication mobile",
            "message" => $message,
            "uploadDir" => $uploadDir,  // Ajoutez cette ligne
            "view" => "views/Administrateur/form_add_appMobile.view.php",
            "template" => "views/common/template.php",
        ];
    
        // Générez la page
        $this->genererPage($data_page);
    }    

     // Fonction pour traiter l'upload de l'image service
     private function handleImageUploadappMobile($image) {
        // Vérifiez s'il y a des erreurs lors de l'upload
        if ($image['error'] !== UPLOAD_ERR_OK) {
            // Gérez l'erreur selon vos besoins
            die("Erreur lors de l'upload de l'image");
        }
    
        // Vérifiez l'extension du fichier
        $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
        $imageExtension = strtolower(pathinfo($image['name'], PATHINFO_EXTENSION));
    
        if (!in_array($imageExtension, $allowedExtensions)) {
            die("L'extension du fichier n'est pas autorisée. Seules les extensions JPG, JPEG, PNG, et GIF sont autorisées.");
        }
    
        // Vérifiez la taille du fichier
        $maxFileSize = 5 * 1024 * 1024; // 5 Mo
        if ($image['size'] > $maxFileSize) {
            die("La taille du fichier dépasse la limite autorisée. La taille maximale autorisée est de 5 Mo.");
        }
    
        // Déplacez le fichier temporaire vers un emplacement permanent
        $uploadDir = "public/Assets/images/appMobile/";
    
        // Vérifiez si le dossier de destination existe, sinon créez-le
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true); // Créez le dossier récursivement avec des permissions élevées (à ajuster selon les besoins)
        }
    
        $imageName = uniqid() . "_" . $image['name'];
        $imagePath = $uploadDir . $imageName;
    
        // Déplacez le fichier
        if (move_uploaded_file($image['tmp_name'], $imagePath)) {
            // Utilisez un chemin relatif pour stocker dans la base de données
            $relativeImagePath = "public/Assets/images/appMobile/" . $imageName;
            return $relativeImagePath;
        } else {
            // Gérez l'erreur si le déplacement échoue
            die("Erreur lors du déplacement de l'image vers l'emplacement permanent");
        }
    }
    
}
