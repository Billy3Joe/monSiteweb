<div class="container">
    <h1 class="mt-5">Ajouter un service</h1>

    <?php if (!empty($message)) : ?>
        <div class="alert alert-success mt-3">
            <?= $message ?>
        </div>
    <?php endif; ?>

    <!-- Formulaire pour ajouter un service -->
    <form action="<?= URL ?>form_add_service" method="post" enctype="multipart/form-data" class="mt-4">
        <div class="mb-3">
            <label for="title" class="form-label">Nom du service:</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Image:</label>
            <input type="file" name="image" class="form-control" accept="image/*" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description:</label>
            <textarea name="description" class="form-control" required></textarea>
        </div>

        <!-- Utilisez un bouton submit pour soumettre le formulaire -->
        <button type="submit" class="btn btn-success">Ajouter un service</button>
    </form>
</div>
