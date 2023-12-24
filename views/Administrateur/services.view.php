<h1 class="text-center">Page de gestion des services</h1>

<a href="<?= URL ?>form_add_service" class="btn btn-success">Ajouter un service</a>

<?php if (empty($services)) : ?>
    <p class="text-center text-danger font-weight-bold">Aucun service enregistré.</p>
<?php else : ?>
    <table class="table">
        <thead>
            <tr>  
                <th>Service</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service) : ?>
                <tr>
                    <td><?= $service['title'] ?></td>
                    <td><img class="customer-image" src="<?= $service['image'] ?>" width="100px" alt="Image du service" /></td>
                    <td><?= $service['description'] ?></td>
                    <td>
                        <!-- Bouton Modifier avec lien vers la page de modification -->
                        <a href="<?= URL ?>update_data_service/<?= $service['id'] ?>" class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <!-- Bouton Supprimer avec lien vers la page de modification -->
                        <a href="<?= URL ?>delete_data_service/<?= $service['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
