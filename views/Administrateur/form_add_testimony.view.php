<div class="container">
    <h1 class="mt-5">Ajouter un avis/témoignage</h1>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-success mt-3">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire pour ajouter un service -->
    <form action="<?= URL ?>form_add_testimony" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="name" class="form-label">Nom du client:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="compagny" class="form-label">Entreprise:</label>
            <input type="text" name="company" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="details" class="form-label">Avis/témoignage:</label>
            <textarea name="details" class="form-control" required></textarea>
        </div>

        <!-- Utilisez un bouton submit pour soumettre le formulaire -->
        <button type="submit" class="btn btn-success">Validez</button>
    </form>
</div>
