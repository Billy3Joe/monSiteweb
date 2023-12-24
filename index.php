<?php
session_start();

//Démarre une session PHP pour stocker des informations spécifiques à l'utilisateur pendant sa navigation sur le site.
// Définition de la constante URL
define(
    "URL",
    // Utilisation de str_replace pour supprimer "index.php" du chemin du script en cours d'exécution
    str_replace(
        "index.php", // Texte à remplacer
        "", // Texte de remplacement (dans ce cas, une chaîne vide pour le supprimer)
        // Concaténation du protocole (HTTP ou HTTPS), du nom de l'hôte et du chemin du script en cours d'exécution
        (isset($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . $_SERVER["PHP_SELF"]
    )
);


//Définit une constante URL contenant l'URL de base du site en utilisant des informations sur le protocole (HTTP ou HTTPS), le nom d'hôte ($_SERVER['HTTP_HOST']) et le chemin du script PHP en cours ($_SERVER["PHP_SELF"]).
// Inclusion des fichiers de classe nécessaires
require_once("./controllers/Toolbox.class.php");
require_once("./controllers/Securite.class.php");
require_once("./controllers/Visiteur/Visiteur.controller.php");
require_once("./controllers/Utilisateur/Utilisateur.controller.php");
require_once("./controllers/Administrateur/Administrateur.controller.php");

// Instanciation des contrôleurs
// Contrôleur pour les visiteurs
$visiteurController = new VisiteurController();
// Contrôleur pour les utilisateurs
$utilisateurController = new UtilisateurController(); 
// Contrôleur pour les administrateurs
$administrateurController = new AdministrateurController();

// ... (votre code précédent)

try {
    if (empty($_GET['page'])) {
        $page = "accueil";
    } else {
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));
        $page = $url[0];
    }
    
       //Pages non autorisées si l'utilisateur n'est pas connecté et administrateur.
       if ($page == "dashboard" || $page == "update_data_user") {
        // Vérifie si l'utilisateur est connecté et a le rôle d'administrateur
        if (!Securite::estConnecte() || !Securite::estAdministrateur()) {
            // Si non, redirige vers la page d'accueil
            Toolbox::ajouterMessageAlerte("Accès non autorisé !", Toolbox::COULEUR_ROUGE);
            header('Location: ' . URL . "login");
         
            Toolbox::ajouterMessageAlerte("Veuillez vous connecter !",Toolbox::COULEUR_ROUGE);
            header("Location: ".URL."login");

            exit;
        }
    }

    switch ($page) {

        case "accueil":
            $visiteurController->accueil();
            break;

        case "login":
            $visiteurController->login();
            break;

        case "validation_login":
            // Gestion de la validation du login
            // Vérifie si les champs 'login' et 'password' du formulaire POST ne sont pas vides
            if (!empty($_POST['login']) && !empty($_POST['password'])) {
                // Sécurise les données du formulaire
                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
    
                // Appelle la méthode validation_login() du contrôleur $utilisateurController
                $utilisateurController->validation_login($login, $password);
            } else {
                // Affiche un message d'alerte si les champs ne sont pas renseignés
                Toolbox::ajouterMessageAlerte("Login ou mot de passe non renseigné", Toolbox::COULEUR_ROUGE);
    
                // Redirige l'utilisateur vers la page de login
                header('Location: ' . URL . "login");
            }
            break;

        case "creerCompte":
            $visiteurController->creerCompte();
            break;

        case "validation_creerCompte":
            // Gestion de la validation de la création de compte
             // Vérifie si les champs 'login', 'password' et 'mail' du formulaire POST ne sont pas vides
             if (!empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['mail'])) {
                // Sécurise les données du formulaire
                $login = Securite::secureHTML($_POST['login']);
                $password = Securite::secureHTML($_POST['password']);
                $mail = Securite::secureHTML($_POST['mail']);
    
                // Appelle la méthode validation_creerCompte() du contrôleur $utilisateurController
                $utilisateurController->validation_creerCompte($login, $password, $mail);
            } else {
                // Affiche un message d'alerte si tous les champs ne sont pas renseignés
                Toolbox::ajouterMessageAlerte("Les 3 informations sont obligatoires !", Toolbox::COULEUR_ROUGE);
    
                // Redirige l'utilisateur vers la page de création de compte
                header("Location: " . URL . "creerCompte");
            }
            break;

        case "renvoyerMailValidation":
            // Gestion de l'envoi du mail de validation
            // Appelle la méthode renvoyerMailValidation() du contrôleur $utilisateurController avec le paramètre $url[1]
            $utilisateurController->renvoyerMailValidation($url[1]);
            break;

        case "validationMail":
            // Gestion de la validation du mail
            // Appelle la méthode validation_mailCompte() du contrôleur $utilisateurController avec les paramètres $url[1] et $url[2]
            $utilisateurController->validation_mailCompte($url[1], $url[2]);
            break;

        case "compte":
            // Gestion des pages liées au compte utilisateur
              // Vérification si l'utilisateur est connecté
              if(!Securite::estConnecte()) {
                // Si non connecté, redirection vers la page de connexion avec un message d'erreur
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."login");
            } elseif(!Securite::checkCookieConnexion()) {
                // Vérification du cookie de connexion
                // Si invalide, déconnexion et redirection vers la page de connexion avec un message d'erreur
                Toolbox::ajouterMessageAlerte("Veuillez vous reconnecter !", Toolbox::COULEUR_ROUGE);
                setcookie(Securite::COOKIE_NAME,"",time() - 3600);
                unset($_SESSION["profil"]);
                header("Location: ".URL."login");
            } else {
                // Regénération du cookie
                Securite::genererCookieConnexion();
                switch($url[1]){
                    // Si la valeur de "$url[1]" est "profil", affiche la page de profil de l'utilisateur
                    case "profil" : $utilisateurController->profil();
                    break;
                     // Si la valeur de "$url[1]" est "deconnexion", appelle la méthode pour se déconnecter
                    case "deconnexion" : $utilisateurController->deconnexion();
                    break;
                    case "validation_modificationMail" : $utilisateurController->validation_modificationMail(Securite::secureHTML($_POST['mail']));
                    break;
                    case "modificationPassword" : $utilisateurController->modificationPassword();
                    break;
                    case "validation_modificationPassword" :
                       // Vérifie si les champs du formulaire POST ne sont pas vides
                        if (!empty($_POST['ancienPassword']) && !empty($_POST['nouveauPassword']) && !empty($_POST['confirmationNouveauPassword'])) {
                            // Sécurise les données du formulaire
                            $ancienPassword = Securite::secureHTML($_POST['ancienPassword']);
                            $nouveauPassword = Securite::secureHTML($_POST['nouveauPassword']);
                            $confirmationNouveauPassword = Securite::secureHTML($_POST['confirmationNouveauPassword']);

                            // Appelle la méthode validation_modificationPassword() du contrôleur $utilisateurController
                            $utilisateurController->validation_modificationPassword($ancienPassword, $nouveauPassword, $confirmationNouveauPassword);
                        } else {
                            // Si les champs ne sont pas tous remplis, affiche un message d'erreur
                            Toolbox::ajouterMessageAlerte("Vous n'avez pas renseigné toutes les informations", Toolbox::COULEUR_ROUGE);

                            // Redirige l'utilisateur vers la page de modification du mot de passe
                            header("Location: " . URL . "compte/modificationPassword");
                        }

                    break;
                    case "suppressionCompte" : $utilisateurController->suppressionCompte();
                    break;
                    case "validation_modificationImage" :
                        if($_FILES['image']['size'] > 0) {
                            $utilisateurController->validation_modificationImage($_FILES['image']);
                        } else {
                            Toolbox::ajouterMessageAlerte("Vous n'avez pas modifié l'image", Toolbox::COULEUR_ROUGE);
                            header("Location: ".URL."compte/profil");
                        }
                    break;
                    default : throw new Exception("La page n'existe pas");
            }
        }
        break;


            // Régénération du cookie de connexion
            Securite::genererCookieConnexion();
            // Gestion des pages liées à l'administration
            case "dashboard" : $administrateurController->dashboard();
            break;

             // Gestion des pages liées à l'administration
             case "users" : $administrateurController->users();
             break;

              // Gestion des pages liées à l'administration
              case "messages" : $administrateurController->messages();
              break;

            case "update_data_user":
                // Vérifie si l'ID de l'utilisateur à modifier est présent dans l'URL
                if (!empty($url[1])) {
                    // Appelle la méthode modifierUtilisateur() du contrôleur $administrateurController
                    $administrateurController->update_data_user($url[1]);
                } else {
                    // Redirige vers la page d'accueil si l'ID n'est pas spécifié
                    header("Location: " . URL . "accueil");
                }
                break;
            // Ajoutez une nouvelle case pour "toggle_user_status"
            case "toggle_user_status":
                // Vérifie si l'ID de l'utilisateur est présent dans l'URL
                if (!empty($url[1])) {
                    $administrateurController->toggleUserStatus($url[1]);
                } else {
                    // Redirige vers la page d'accueil si l'ID n'est pas spécifié
                    header("Location: " . URL . "accueil");
                }
                break;
                // Ajoutez une nouvelle route pour la suppression
                case "delete_message_user":
                    // Vérifiez si l'identifiant du message à supprimer est présent dans la requête POST
                    if (!empty($_POST['id'])) {
                        // Appellez la méthode de suppression dans votre modèle
                        $success = $AdministrateurManager->deleteMessage($_POST['id']);

                        // Retournez une réponse appropriée (par exemple, en JSON)
                        if ($success) {
                            echo json_encode(["success" => true]);
                        } else {
                            echo json_encode(["success" => false, "error" => "Une erreur s'est produite lors de la suppression du message."]);
                        }
                    } else {
                        // L'identifiant du message n'est pas spécifié dans la requête
                        echo json_encode(["success" => false, "error" => "Identifiant du message manquant dans la requête."]);
                    }
                    // Assurez-vous de quitter ici pour éviter que d'autres choses ne soient envoyées dans la réponse
                    exit;

                    case "choix_creations":
                        // Vérifie si le choix de l'utilisateur est présent dans la requête POST
                        if (!empty($_POST['choixCreation'])) {
                            $choix = Securite::secureHTML($_POST['choixCreation']);
                            // Redirige l'utilisateur en fonction de son choix
                            if ($choix === "developpement") {
                                header("Location: " . URL . "developpement");
                            } elseif ($choix === "design") {
                                header("Location: " . URL . "design");
                            }
                        } else {
                            // Le choix de l'utilisateur n'est pas spécifié dans la requête
                            // Vous pouvez rediriger l'utilisateur vers une page d'erreur ou faire une autre action
                        }
                        break;   
                            
                        case "developpement":
                            $visiteurController->creationsDeveloppement();
                            break;
                        
                        case "design":
                            $visiteurController->creationsDesign();
                            break;

                        case "services" : $administrateurController->services();
                        break;

                        case "form_add_service" : $administrateurController->add_data_service();
                        break;

                        case "solutionsWeb" : $visiteurController->solutionsWeb();
                        break;

                        case "appMobile" : $visiteurController->appMobile();
                        break;

                        case "conceptionStrategie" : $visiteurController->conceptionStrategie();
                        break;
                        
                        case "webSolutions" : $administrateurController->webSolutions();
                        break;

                        case "form_add_webSolutions" : $administrateurController->add_data_webSolutions();
                        break;
                       
                      
        default:
            throw new Exception("La page n'existe pas");
    }
} catch (Exception $e) {
    $visiteurController->pageErreur($e->getMessage());
}
