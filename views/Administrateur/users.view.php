<h1 style="text-align:center;">Page de gestion des droits des utilisateurs</h1>
    <table class="table">
    <thead>
        <tr>  
            <th>Photo</th>
            <th>Login</th>
            <th>Email</th>
            <th>Est_valide</th>
            <th>Rôle</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($utilisateurs as $utilisateur) : ?>
            <tr>
                <td> <img class="customer-image" src="<?= URL; ?>public/Assets/images/<?= $utilisateur['image'] ?>" width="100px" alt="photo de profil" /></td>
                <td><?= $utilisateur['login'] ?></td>
                <td><?= $utilisateur['mail'] ?></td>
                <td><?= $utilisateur['est_valide'] ?></td>
                <td><?= $utilisateur['role'] ?></td>
                <td>
                    <!-- Bouton Modifier avec lien vers la page de modification -->
                    <a href="<?= URL ?>update_data_user/<?= $utilisateur['id'] ?>" class="btn btn-warning">Modifier</a>

                    <!-- Formulaire pour l'activation/désactivation -->
                    <form action="<?= URL ?>toggle_user_status/<?= $utilisateur['id'] ?>" method="post">
                        <?php
                        // Déterminez le texte et la classe CSS en fonction de l'état de l'utilisateur
                        $text = $utilisateur['est_valide'] ? 'Désactivé' : 'Activé';
                        $class = $utilisateur['est_valide'] ? 'btn-secondary' : 'btn-success';
                        ?>

                        <button type="submit" class="btn <?= $class ?>">
                            <?= $text ?>
                        </button>
                    </form>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>