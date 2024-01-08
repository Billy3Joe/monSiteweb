<h1 class="text-center">Page de gestion des expériences</h1>

<a href="<?= URL ?>form_add_experience" class="btn btn-success">Ajouter une expérience</a>

<?php if (empty($experiences)) : ?>
    <p class="text-center text-danger font-weight-bold">Aucune expérience enregistré.</p>
<?php else : ?>
    <table class="table">
        <thead>
            <tr>  
                <th>Expérience</th>
                <th>Image</th>
                <th>Description</th>
                <th>Liens des clients</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($experiences as $experience) : ?>
                <tr>
                    <td><?= $experience['title'] ?></td>
                    <td><img class="customer-image" src="<?= $experience['image'] ?>" width="100px" alt="Image de l'expérience" /></td>
                    <td><?= $experience['description'] ?></td>
                    <td>
                        <a href="<?= $experience['link_customer'] ?>" target="_blank" rel="noopener noreferrer">
                            <!-- Place the text or content here that you want to be clickable -->
                            <?= $experience['link_customer'] ?>
                        </a>
                    </td>

                    <td>
                        <!-- Bouton Modifier avec lien vers la page de modification -->
                        <a href="<?= URL ?>update_data_experience/<?= $experience['id'] ?>" class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <!-- Bouton Supprimer avec lien vers la page de modification -->
                        <a href="<?= URL ?>delete_data_experience/<?= $experience['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
