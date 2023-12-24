<?php
require_once("./controllers/MainController.controller.php");
require_once("./models/Visiteur/Visiteur.model.php");

class VisiteurController extends MainController {
    private $visiteurManager;

    public function __construct(){
        $this->visiteurManager = new VisiteurManager();
    }

    //Propriété "page_css" : tableau permettant d'ajouter des fichiers CSS spécifiques
    //Propriété "page_javascript" : tableau permettant d'ajouter des fichiers JavaScript spécifiques
    public function accueil() {
        // Toolbox::ajouterMessageAlerte("test", Toolbox::COULEUR_VERTE);
        // Toolbox::ajouterMessageAlerte("test2", Toolbox::COULEUR_ORANGE);
        // Toolbox::ajouterMessageAlerte("test3", Toolbox::COULEUR_ROUGE);
        $services = $this->visiteurManager->getServices();
        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "services" => $services,
            "view" => "views/Visiteur/accueil.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function login() {
        $data_page = [
            "page_description" => "Page de connexion",
            "page_title" => "Page de connexion",
            "view" => "views/Visiteur/login.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function creerCompte() {
        $data_page = [
            "page_description" => "Page de création de compte",
            "page_title" => "Page de création de compte",
            "view" => "views/Visiteur/creerCompte.view.php",
            "template" => "views/common/template.php"
        ];
        $this->genererPage($data_page);
    }

    public function voirCreations()
    {
        $data_page = [
            "page_description" => "Description de la page d'accueil",
            "page_title" => "Titre de la page d'accueil",
            "view" => "views/Visiteur/accueil.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function creationsDeveloppement()
    {
        $data_page = [
            "page_description" => "Description de la page de création développement",
            "page_title" => "Titre de la page d'accueil",
            "view" => "views/Visiteur/developpement.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function creationsDesign()
    {
        $data_page = [
            "page_description" => "Description de la page de création design",
            "page_title" => "Titre de la page d'accueil",
            "view" => "views/Visiteur/design.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function solutionsWeb()
    {
        $data_page = [
            "page_description" => "Description de la page Solution Web",
            "page_title" => "Titre de la page Solution Web",
            "view" => "views/Visiteur/solutionsWeb.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function appMobile()
    {
        $data_page = [
            "page_description" => "Description de la page Application Mobile",
            "page_title" => "Titre de la page Application Mobile",
            "view" => "views/Visiteur/appMobile.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }

    public function conceptionStrategie()
    {
        $data_page = [
            "page_description" => "Description de la page Conception Stratégie",
            "page_title" => "Titre de la page Solution Conception Strategie",
            "view" => "views/Visiteur/conceptionStrategie.view.php",
            "template" => "views/common/template.php",
        ];
        $this->genererPage($data_page);
    }



    public function pageErreur($message){
        parent::pageErreur($message);
    }
}