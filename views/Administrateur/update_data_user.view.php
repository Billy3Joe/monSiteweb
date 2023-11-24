<!-- ... Vos autres balises HTML ... -->

<h2>Modification du rôle de <?php echo $utilisateur['login'] ?></h2>

<?php if (isset($erreur)) : ?>
    <div class="alert alert-danger"><?= $erreur ?></div>
<?php endif; ?>

<form method="post" action="<?= URL ?>update_data_user/<?= $utilisateur['id'] ?>">
    <!-- Champs pour le nouveau rôle -->
    <div class="mb-3">
        <label for="role" class="form-label">Nouveau rôle :</label>
        <select class="form-select" name="role">
            <!-- Options du sélecteur de rôle -->
            <option value="utilisateur" <?= $utilisateur['role'] === "utilisateur" ? "selected" : "" ?>>Utilisateur</option>
            <option value="superutilisateur" <?= $utilisateur['role'] === "superutilisateur" ? "selected" : "" ?>>Super Utilisateur</option>
            <option value="administrateur" <?= $utilisateur['role'] === "administrateur" ? "selected" : "" ?>>Administrateur</option>
        </select>
    </div>

    <!-- Bouton de soumission du formulaire -->
    <button type="submit" class="btn btn-primary">Enregistrer la modification</button>
</form>

<!-- ... Autres balises HTML ... -->
