<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Utilisateur/Utilisateur.model.php");

class UtilisateurController extends MainController {
    private $utilisateurManager;

    public function __construct(){
        $this->utilisateurManager = new UtilisateurManager();
    }

        /**
     * Fonction de validation du processus de connexion.
     *
     * @param string $login     Le nom d'utilisateur saisi dans le formulaire.
     * @param string $password  Le mot de passe saisi dans le formulaire.
     */
    public function validation_login($login, $password)
    {
        // Vérifie si la combinaison login/mot de passe est valide
        if ($this->utilisateurManager->isCombinaisonValide($login, $password)) {
            // Vérifie si le compte associé au login est activé
            if ($this->utilisateurManager->estCompteActive($login)) {
                // Affiche un message de bienvenue et redirige vers le profil
                Toolbox::ajouterMessageAlerte("Bienvenuesur le site " . $login . " !", Toolbox::COULEUR_VERTE);
                $_SESSION['profil'] = [
                    "login" => $login,
                ];
                Securite::genererCookieConnexion();
                
                // Affiche les informations du profil et du cookie (à des fins de débogage)
                echo $_SESSION['profil'][Securite::COOKIE_NAME];
                echo "<br />";
                echo $_COOKIE[Securite::COOKIE_NAME];

                // Redirige vers la page du profil
                header("location: " . URL . "compte/profil");
            } else {
                // Affiche un message d'erreur si le compte n'est pas activé
                $message = "Le compte " . $login . " n'a pas été activé. ";
                // $message .= "<a href='renvoyerMailValidation/" . $login . "'>Renvoyez le mail de validation</a>";
                $message .= "<a href='renvoyerMailValidation/" . $login . "'>Veillez nous envoyer un message via le formulaire de contact afin que votre compte puisse être activé. </a>. Merci à vous...";
                Toolbox::ajouterMessageAlerte($message, Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "login");
            }
        } else {
            // Affiche un message d'erreur si la combinaison login/mot de passe est invalide
            Toolbox::ajouterMessageAlerte("Combinaison Login / Mot de passe non valide", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "login");
        }
    }


    /**
     * Fonction pour afficher la page de profil de l'utilisateur.
     */
    public function profil()
    {
        // Récupère les informations de l'utilisateur depuis la base de données
        $datas = $this->utilisateurManager->getUserInformation($_SESSION['profil']['login']);

        // Ajoute le rôle de l'utilisateur aux données de session
        $_SESSION['profil']["role"] = $datas['role'];

        // Définit les données spécifiques à la page
        $data_page = [
            "page_description" => "Page de profil",
            "page_title" => "Page de profil",
            "utilisateur" => $datas,
            "page_javascript" => ['profil.js'],
            "view" => "views/Utilisateur/profil.view.php",
            "template" => "views/common/template.php"
        ];

        // Génère la page en utilisant la fonction genererPage du contrôleur
        $this->genererPage($data_page);
    }


    public function deconnexion() {
        Toolbox::ajouterMessageAlerte("La deconnexion est effectuée",Toolbox::COULEUR_VERTE);
        unset($_SESSION['profil']);
        setcookie(Securite::COOKIE_NAME,"",time() - 3600);
        header("Location: ".URL."accueil");
    }

        /**
     * Fonction pour valider la création d'un nouveau compte utilisateur.
     *
     * @param string $login    Le nom d'utilisateur saisi dans le formulaire.
     * @param string $password Le mot de passe saisi dans le formulaire.
     * @param string $mail     L'adresse e-mail saisie dans le formulaire.
     */
    public function validation_creerCompte($login, $password, $mail)
    {
        // Vérifie si le login est disponible
        if ($this->utilisateurManager->verificationLoginDisponible($login)) {
            // Crypte le mot de passe avec l'algorithme par défaut de PHP
            $passwordCrypte = password_hash($password, PASSWORD_DEFAULT);

            // Génère une clé aléatoire pour la validation par email
            $clef = rand(0, 9999);

            // Tente de créer le compte dans la base de données
            if ($this->utilisateurManager->bdCreerCompte($login, $passwordCrypte, $mail, "utilisateur", $clef, "profils/profil.png")) {
                // Envoie le mail de validation
                $this->sendMailValidation($login, $mail, $clef);

                // Affiche un message de succès et redirige vers la page de connexion
                Toolbox::ajouterMessageAlerte("Le compte a été créé. Un mail de validation vous a été envoyé !", Toolbox::COULEUR_VERTE);
                header("Location: " . URL . "login");
            } else {
                // Affiche un message d'erreur en cas d'échec de la création du compte
                Toolbox::ajouterMessageAlerte("Erreur lors de la création du compte. Veuillez réessayer !", Toolbox::COULEUR_ROUGE);
                header("Location: " . URL . "creerCompte");
            }
        } else {
            // Affiche un message d'erreur si le login est déjà utilisé
            Toolbox::ajouterMessageAlerte("Le login est déjà utilisé !", Toolbox::COULEUR_ROUGE);
            header("Location: " . URL . "creerCompte");
        }
    }


    /**
     * Fonction privée pour envoyer un mail de validation lors de la création du compte.
     *
     * @param string $login Le nom d'utilisateur associé au compte.
     * @param string $mail L'adresse e-mail associée au compte.
     * @param string $clef La clé de validation associée au compte.
     */
    private function sendMailValidation($login, $mail, $clef)
    {
        // Construit l'URL de validation en utilisant le login et la clé
        $urlVerification = URL . "validationMail/" . $login . "/" . $clef;

        // Définit le sujet et le message du mail
        $sujet = "Création du compte sur le site xxx";
        $message = "Pour valider votre compte, veuillez cliquer sur le lien suivant : " . $urlVerification;

        // Appelle la fonction sendMail de la classe Toolbox pour envoyer le mail
        Toolbox::sendMail($mail, $sujet, $message);
    }

    /**
     * Fonction publique pour renvoyer le mail de validation.
     *
     * @param string $login Le nom d'utilisateur associé au compte.
     */
    public function renvoyerMailValidation($login)
    {
        // Récupère les informations de l'utilisateur, notamment son mail et sa clé de validation
        $utilisateur = $this->utilisateurManager->getUserInformation($login);

        // Appelle la fonction sendMailValidation pour renvoyer le mail de validation
        $this->sendMailValidation($login, $utilisateur['mail'], $utilisateur['clef']);

        // Redirige l'utilisateur vers la page de connexion après l'envoi du mail
        header("Location: " . URL . "login");
    }


    public function validation_mailCompte($login,$clef) {
        if($this->utilisateurManager->bdValidationMailCompte($login,$clef)) {
            Toolbox::ajouterMessageAlerte("Le compte a été activé !", Toolbox::COULEUR_VERTE);
            // Soit l'utilisateur est directement connecté
            $_SESSION['profil'] = [
                "login" => $login,
            ];
            header('Location: '.URL.'compte/profil');
            // Ou l'utilisateur doit se connecté
            Toolbox::ajouterMessageAlerte("Le compte a été activé ! Veuillez vous connecter", Toolbox::COULEUR_VERTE);
            header('Location: '.URL.'login');
        } else {
            Toolbox::ajouterMessageAlerte("Le compte n'a pas été activé !", Toolbox::COULEUR_ROUGE);
            header('Location: '.URL.'creerCompte');
        }
    }

    public function validation_modificationMail($mail) {
        if($this->utilisateurManager->bdModificationMailUser($_SESSION['profil']['login'],$mail)) {
            Toolbox::ajouterMessageAlerte("La modification de l'adresse email est effectuée", Toolbox::COULEUR_VERTE);
        } else {
            Toolbox::ajouterMessageAlerte("Aucune modification de l'adresse email n'est effectuée", Toolbox::COULEUR_ROUGE);
        }
        header("Location: ".URL."compte/profil");
    }

    public function modificationPassword() {
        $data_page = [
            "page_description" => "Page de modification du password",
            "page_title" => "Page de modification du password",
            "page_javascript" => ["modificationPassword.js"],
            "view" => "views/Utilisateur/modificationPassword.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function validation_modificationPassword($ancienPassword,$nouveauPassword,$confirmationNouveauPassword) {
        if($nouveauPassword === $confirmationNouveauPassword) {
            if($this->utilisateurManager->isCombinaisonValide($_SESSION['profil']['login'],$ancienPassword)) {
                $passwordCrypte = password_hash($nouveauPassword,PASSWORD_DEFAULT);
                if($this->utilisateurManager->bdModificationPassword($_SESSION['profil']['login'],$passwordCrypte)) {
                    Toolbox::ajouterMessageAlerte("La modification du mot de passe a été effectuée", Toolbox::COULEUR_VERTE);
                    header("Location: ".URL."compte/profil");
                } else {
                    Toolbox::ajouterMessageAlerte("La modification du mot de passe a échouée", Toolbox::COULEUR_ROUGE);
                    header("Location: ".URL."compte/modificationPassword");
                }
            } else {
                Toolbox::ajouterMessageAlerte("La combinaison login / ancien mot de passe ne correspond pas", Toolbox::COULEUR_ROUGE);
                header("Location: ".URL."compte/modificationPassword");
            }            
        } else {
            Toolbox::ajouterMessageAlerte("Les mots de passes ne correspondent pas", Toolbox::COULEUR_ROUGE);
            header("Location: ".URL."compte/modificationPassword");
        }
    }

    public function suppressionCompte() {
        $this->dossierSuppressionImageUtilisateur($_SESSION['profil']['login']);
        rmdir("public/Assets/images/profils/".$_SESSION['profil']['login']);

        if($this->utilisateurManager->bdSuppressionCompte($_SESSION['profil']['login'])) {
            Toolbox::ajouterMessageAlerte("La suppression du compte est effectuée", Toolbox::COULEUR_VERTE);
            $this->deconnexion();
        } else {
            Toolbox::ajouterMessageAlerte("La suppression n'a pas été effectuée. Contactez l'administrateur",Toolbox::COULEUR_ROUGE);
            header("Location: ".URL."compte/profil");
        }
    }

    public function validation_modificationImage($file) {
        try {
            $repertoire = "public/Assets/images/profils/".$_SESSION['profil']['login']."/";
            $nomImage = Toolbox::ajoutImage($file,$repertoire); //ajout image dans le répertoire
            // Supression de l'ancienne image
            $this->dossierSuppressionImageUtilisateur($_SESSION['profil']['login']);
            // Ajout de la nouvelle image dans la BD
            $nomImageBD = "profils/".$_SESSION['profil']['login']."/".$nomImage;
            if($this->utilisateurManager->bdAjoutImage($_SESSION['profil']['login'],$nomImageBD)) {
                Toolbox::ajouterMessageAlerte("La modification de l'image est effectuée", Toolbox::COULEUR_VERTE);
            } else {
                Toolbox::ajouterMessageAlerte("La modification de l'image n'a pas été effectuée", Toolbox::COULEUR_ROUGE);
            }
        } catch(Exception $e) {
            Toolbox::ajouterMessageAlerte($e->getMessage(), Toolbox::COULEUR_ROUGE);
        }
      
        header("Location: ".URL."compte/profil");
    }

    private function dossierSuppressionImageUtilisateur($login) {
        // $ancienneImage = $this->utilisateurManager->getImageUtilisateur($_SESSION['profil']['login']);
        $ancienneImage = $this->utilisateurManager->getImageUtilisateur($login);

        if($ancienneImage !== "profils/profil.png"){
            unlink("public/Assets/images/".$ancienneImage);
        }
    }

    public function pageErreur($message){
        parent::pageErreur($message);
    }
}