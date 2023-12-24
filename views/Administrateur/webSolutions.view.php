<h1 class="text-center">Page de gestion des solutions web</h1>

<a href="<?= URL ?>form_add_webSolution" class="btn btn-success">Ajouter une solution web</a>

<?php if (empty($webSolutions)) : ?>
    <p class="text-center text-danger font-weight-bold">Aucune solution web enregistrée.</p>
<?php else : ?>
    <table class="table">
        <thead>
            <tr>  
                <th>Solution web</th>
                <th>Image</th>
                <th>Description</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($webSolutions as $webSolution) : ?>
                <tr>
                    <td><?= $webSolution['title'] ?></td>
                    <td><img class="customer-image" src="<?= $webSolution['image'] ?>" width="100px" alt="Image du service" /></td>
                    <td><?= $webSolution['description'] ?></td>
                    <td>
                        <!-- Bouton Modifier avec lien vers la page de modification -->
                        <a href="<?= URL ?>update_data_webSolution/<?= $webSolution['id'] ?>" class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <!-- Bouton Supprimer avec lien vers la page de modification -->
                        <a href="<?= URL ?>delete_data_webSolution/<?= $webSolution['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
