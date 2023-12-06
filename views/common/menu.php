<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
      <!-- Barre de navigation responsive Bootstrap -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <!-- Liste des liens de navigation -->
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <!-- Lien vers la page d'accueil -->
            <li class="nav-item">
                <a class="nav-link" aria-current="page" href="<?= URL; ?>accueil">Accueil</a>
            </li>
            
            <!-- Condition : Si l'utilisateur n'est pas connecté -->
            <?php if(empty($_SESSION['profil'])) : ?>
                <!-- Lien vers la page de connexion -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= URL; ?>login">Se connecter</a>
                </li>
                
                <!-- Lien vers la page de création de compte -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= URL; ?>creerCompte">Créer compte</a>
                </li>
            
            <!-- Sinon (l'utilisateur est connecté) -->
            <?php else : ?>
                <!-- Lien vers la page du profil de l'utilisateur -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= URL; ?>compte/profil">Profil</a>
                </li>
                
                <!-- Lien pour se déconnecter -->
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= URL; ?>compte/deconnexion">Se déconnecter</a>
                </li>
            
            <!-- Fin de la condition -->
            <?php endif; ?>
            
            <!-- Condition : Si l'utilisateur est connecté et est administrateur -->
            <?php if(Securite::estConnecte() && Securite::estAdministrateur()) : ?>
                <!-- Dropdown pour les liens d'administration -->
                <li class="nav-item">
                   <a class="nav-link" aria-current="page" href="<?= URL; ?>dashboard">Dashboard</a>
                </li>
            <!-- Fin de la condition -->
            <?php endif; ?>

            <!-- Condition : Si l'utilisateur est connecté et est administrateur -->
            <?php if(Securite::estConnecte() && Securite::estAdministrateur()) : ?>
                <!-- Dropdown pour les liens d'administration -->
                <li class="nav-item">
                   <a class="nav-link" aria-current="page" href="<?= URL; ?>users">Utilisateurs</a>
                </li>
            <!-- Fin de la condition -->
            <?php endif; ?>

             <!-- Condition : Si l'utilisateur est connecté et est administrateur -->
             <?php if(Securite::estConnecte() && Securite::estAdministrateur()) : ?>
                <!-- Dropdown pour les liens d'administration -->
                <li class="nav-item">
                   <a class="nav-link" aria-current="page" href="<?= URL; ?>messages">Messages</a>
                </li>
            <!-- Fin de la condition -->
            <?php endif; ?>

            <!-- Condition : Si l'utilisateur est connecté et est administrateur -->
            <?php if(Securite::estConnecte() && Securite::estAdministrateur()) : ?>
                <!-- Dropdown pour les liens d'administration -->
                <li class="nav-item">
                   <a class="nav-link" aria-current="page" href="<?= URL; ?>services">Services</a>
                </li>
            <!-- Fin de la condition -->
            <?php endif; ?>
        </ul>
    </div>
  </div>
</nav>
