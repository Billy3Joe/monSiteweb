<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" aria-current="page" href="<?= URL; ?>accueil">Accueil</a>
                </li>
                <!-- Ajout d'un lien "Services" avec un dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="servicesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Services
                    </a>
                    <div class="dropdown-menu" aria-labelledby="servicesDropdown">
                        <a class="dropdown-item" href="<?= URL; ?>solutionsWeb">Solutions Web et d'entreprise</a>
                        <a class="dropdown-item" href="<?= URL; ?>appMobile">Application mobile</a>
                        <a class="dropdown-item" href="<?= URL; ?>conceptionStrategie">Conception et stratégie Ui/Ux</a>
                        <!-- Ajoutez d'autres éléments du dropdown au besoin -->
                    </div>
                </li>
                <!-- Ajout d'un lien "Technologies" avec un dropdown -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="technologiesDropdown" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Technologies
                    </a>
                    <div class="dropdown-menu" aria-labelledby="technologiesDropdown">
                        <a class="dropdown-item" href="<?= URL; ?>technologie">Backend Technologies</a>
                        <a class="dropdown-item" href="<?= URL; ?>technologie">Frontend Technomogies</a>
                        <a class="dropdown-item" href="<?= URL; ?>technologie">Mobile Technomogies</a>
                        <a class="dropdown-item" href="<?= URL; ?>technologie">E-Commerce & CMS Technomogies</a>
                        <!-- Ajoutez d'autres éléments du dropdown au besoin -->
                    </div>
                </li>
               

                <!-- Condition pour l'administration -->
                <?php if(Securite::estConnecte() && Securite::estAdministrateur()) : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL; ?>dashboard">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL; ?>users">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL; ?>messages">Messages</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL; ?>services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL; ?>experiences">Expériences</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL; ?>webSolutions">Solutions Web</a>
                    </li>
                <?php endif; ?>

                 <!-- Condition et liens pour la connexion et le compte utilisateur -->
                 <?php if(empty($_SESSION['profil'])) : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL; ?>login">Se connecter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL; ?>creerCompte">Créer compte</a>
                    </li>
                <?php else : ?>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL; ?>compte/profil">Profil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="<?= URL; ?>compte/deconnexion">Se déconnecter</a>
                    </li>
                <?php endif; ?>
            </ul>
            <!-- Le reste de votre menu -->
        </div>
    </div>
</nav>