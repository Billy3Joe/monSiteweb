<?php
// Inclure la classe Toolbox qui contient des méthodes utiles (voir fichier Toolbox.class.php)
require_once("controllers/Toolbox.class.php");

// Définir la classe MainController comme abstraite (ne peut pas être instanciée directement)
abstract class MainController {

    // Méthode pour générer une page en utilisant les données passées en paramètre
    protected function genererPage($data) {
        // Extraire les variables du tableau associatif $data et les rendre accessibles directement
        extract($data);

        // Démarrer la mise en tampon de sortie
        ob_start();

        // Inclure le fichier de vue spécifié par la variable $view
        require_once($view);

        // Récupérer le contenu généré dans la mise en tampon de sortie et le stocker dans $page_content
        $page_content = ob_get_clean();

        // Inclure le fichier de template spécifié par la variable $template, qui contient la structure commune de la page
        require_once($template);
    }

    // Méthode pour afficher une page d'erreur en utilisant le message passé en paramètre
    protected function pageErreur($message) {
        // Préparer les données pour la page d'erreur dans un tableau associatif
        $data_page = [
            "page_description" => "Page permettant de gérer les erreurs",
            "page_title" => "Page d'erreur",
            "message" => $message,
            "view" => "./views/erreur.view.php", // Chemin vers le fichier de vue pour la page d'erreur
            "template" => "views/common/template.php" // Chemin vers le fichier de template commun pour toutes les pages
        ];

        // Appeler la méthode genererPage avec les données spécifiques à la page d'erreur pour afficher la page
        $this->genererPage($data_page);
    }
}
