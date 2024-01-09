<h1 class="text-center">Page de gestion des testimonys</h1>

<a href="<?= URL ?>form_add_testimony" class="btn btn-success">Ajouter un avis/témoignage</a>

<?php if (empty($testimonials)) : ?>
    <p class="text-center text-danger font-weight-bold">Aucun avis/témoignages enregistré.</p>
<?php else : ?>
    <table class="table">
        <thead>
            <tr>  
                <th>Nom du client</th>
                <th>Entrprise</th>
                <th>Avis/témoignages</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($testimonials as $testimonial) : ?>
                <tr>
                    <td><?php echo $testimonial["name"] ?></td>
                    <td><?= $testimonial['company'] ?></td>
                    <td><?= $testimonial['details'] ?></td>
                    <td>
                        <!-- Bouton Modifier avec lien vers la page de modification -->
                        <a href="<?= URL ?>update_data_testimony/<?= $testimonial['id'] ?>" class="btn btn-warning">Modifier</a>
                    </td>
                    <td>
                        <!-- Bouton Supprimer avec lien vers la page de modification -->
                        <a href="<?= URL ?>delete_data_testimony/<?= $testimonial['id'] ?>" class="btn btn-danger">Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php endif; ?>
