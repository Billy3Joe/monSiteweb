<h1 class="text-center">Page de gestion des applications mobile</h1>

<a href="<?= URL ?>form_add_appMobile" class="btn btn-success">Ajouter une application mobile</a>

<?php if (empty( $mobileApps)) : ?>
    <p class="text-center text-danger font-weight-bold">Aucune application mobile enregistrée.</p>
<?php else : ?>
    <table class="table">
        <thead>
            <tr>  
                <th>App Mobile/th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ( $mobileApps as $mobileApp) : ?>
                <tr>
                    <td><?= $mobileApp['title'] ?></td>
                    <td><img class="customer-image" src="<?= $mobileApp['image'] ?>" width="100px" alt="Image du service" /></td>
                    <td><?= $mobileApp['description'] ?></td>
                    <td>
                        <!-- Bouton Modifier avec lien vers la page de modification -->
                        <a href="<?= URL ?>update_data_mobileApp/<?= $mobileApp['id'] ?>" class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <!-- Bouton Supprimer avec lien vers la page de modification -->
                        <a href="<?= URL ?>delete_data_mobileApp/<?= $mobileApp['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
