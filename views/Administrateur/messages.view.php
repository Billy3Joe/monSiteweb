<h1 style="text-align:center;">Page de gestion de la messagerie</h1>
    <table class="table">
    <thead>
        <tr>  
            <th>Nom</th>
            <th>Email</th>
            <th>Téléphone</th>
            <th>Message</th>
            <th>Date</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($messages as $message) : ?>
            <tr>
                <td><?= $message['name'] ?></td>
                <td><?= $message['email'] ?></td>
                <td><?= $message['phone'] ?></td>
                <td><?= $message['message'] ?></td>
                <td><?= $message['datetime'] ?></td>
                <td>
                    <!-- Bouton Modifier avec lien vers la page de modification -->
                    <a href="<?= URL ?>delete_message_user/<?= $message['id'] ?>" class="btn btn-danger">Suprimer</a>

                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    </table>