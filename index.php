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


//Inclut les fichiers des classes et des contrôleurs nécessaires pour le fonctionnement du site.
//Crée des instances des contrôleurs VisiteurController, UtilisateurController et AdministrateurController qui seront utilisées pour gérer les différentes pages et actions.

try {
    //Début d'un bloc d'essai pour capturer les éventuelles exceptions qui pourraient être lancées pendant l'exécution du code.
    // Vérifie si la clé 'page' existe dans la variable superglobale $_GET et si elle est vide
    if (empty($_GET['page'])) {
        // Si 'page' est vide, définit la variable $page à la valeur "accueil"
        $page = "accueil";
    } else {
        // Si 'page' n'est pas vide, filtre et nettoie la valeur de 'page'
        // en utilisant filter_var avec l'option FILTER_SANITIZE_URL
        // puis divise la chaîne en un tableau en utilisant '/' comme délimiteur
        $url = explode("/", filter_var($_GET['page'], FILTER_SANITIZE_URL));

        // La première partie de l'URL (avant le premier '/') est extraite
        // et assignée à la variable $page
        $page = $url[0];
    }
 
     //Pages non autorisées si l'utilisateur n'est pas connecté et administrateur.
     if ($page == "dashboard" || $page == "droits") {
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

      //Vérifie si le paramètre GET 'page' est vide. Si c'est le cas, la variable $page est définie sur "accueil" par défaut.
     // Sinon, la valeur de 'page' est filtrée et divisée en un tableau $url en utilisant le délimiteur '/' pour extraire différentes parties de l'URL.
    // La première partie de l'URL est ensuite stockée dans la variable $page.
    switch ($page) {
        // Si la valeur de $page est "accueil"
        case "accueil":
            // Appelle la méthode accueil() du contrôleur $visiteurController
            $visiteurController->accueil();
            break;
        // Si la valeur de $page est "login"
        case "login":
            // Appelle la méthode login() du contrôleur $visiteurController
            $visiteurController->login();
            break;
    
        // Si la valeur de $page est "validation_login"
        case "validation_login":
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
    
        // Si la valeur de $page est "creerCompte"
        case "creerCompte":
            // Appelle la méthode creerCompte() du contrôleur $visiteurController
            $visiteurController->creerCompte();
            break;
    
        // Si la valeur de $page est "validation_creerCompte"
        case "validation_creerCompte":
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
    
        // Si la valeur de $page est "renvoyerMailValidation"
        case "renvoyerMailValidation":
            // Appelle la méthode renvoyerMailValidation() du contrôleur $utilisateurController avec le paramètre $url[1]
            $utilisateurController->renvoyerMailValidation($url[1]);
            break;
    
        // Si la valeur de $page est "validationMail"
        case "validationMail":
            // Appelle la méthode validation_mailCompte() du contrôleur $utilisateurController avec les paramètres $url[1] et $url[2]
            $utilisateurController->validation_mailCompte($url[1], $url[2]);
            break;
            break;

        case "compte" : 
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
        case "administration" :
            if(!Securite::estConnecte()) {
                Toolbox::ajouterMessageAlerte("Veuillez vous connecter !", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."login");
            } elseif(!Securite::checkCookieConnexion()) {
                // Vérification du cookie de connexion
                // Si invalide, déconnexion et redirection vers la page de connexion avec un message d'erreur
                Toolbox::ajouterMessageAlerte("Veuillez vous reconnecter !", Toolbox::COULEUR_ROUGE);
                setcookie(Securite::COOKIE_NAME,"",time() - 3600);
                unset($_SESSION["profil"]);
                header("Location: ".URL."login");
            } elseif(!Securite::estAdministrateur()) {
                // Vérification si l'utilisateur est administrateur
                // Si non administrateur, redirection vers la page d'accueil avec un message d'erreur
                Toolbox::ajouterMessageAlerte("Vous n'avez le droit d'être ici",Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."accueil");
            }/* else {
                // Régénération du cookie de connexion
                Securite::genererCookieConnexion();
                switch($url[1]) { 
                    // Si la valeur de "$url[1]" est "droits", affiche la page de gestion des droits
                    case "droits" : $administrateurController->droits();
                    break;
                    case "dashboard" : $administrateurController->dashboard();
                    break;
                     // Si la valeur de "$url[1]" est "validation_modificationRole", appelle la méthode pour valider la modification des rôles
                    case "validation_modificationRole" : $administrateurController->validation_modificationRole($_POST['login'],$_POST['role']);
                    break;
                    // Si la valeur de "$url[1]" ne correspond à aucun "case" défini, une exception est lancée
                    default : throw new Exception("La page n'existe pas");
                }
            }*/
        break;
        // Régénération du cookie de connexion
        Securite::genererCookieConnexion();
        
        case "dashboard" : $administrateurController->dashboard();
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
            
        
        // Si la valeur de "$url[1]" ne correspond à aucun "case" défini, une exception est lancée
       //  default : throw new Exception("La page n'existe pas");
         // Si la valeur de "$page" ne correspond à aucun "case" défini, une exception est lancée
        default : throw new Exception("La page n'existe pas pas");
    }
} catch (Exception $e) {
    $visiteurController->pageErreur($e->getMessage());
}

   
