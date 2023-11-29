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
                    <!-- Bouton Supprimer avec confirmation et attribut data-id -->
                    <a href="<?= URL ?>delete_message_user/<?= $message['id'] ?>" class="btn btn-danger delete-message" data-message-id="<?= $message['id'] ?>">Supprimer</a>
            </tr>
        <?php endforeach; ?>

        <script>
            document.addEventListener("DOMContentLoaded", function () {
                // Sélectionnez tous les liens de suppression par leur classe
                var deleteButtons = document.querySelectorAll('.delete-message');

                // Ajoutez un gestionnaire d'événement à chaque bouton de suppression
                deleteButtons.forEach(function (button) {
                    button.addEventListener('click', function (event) {
                        // Empêche le comportement de clic par défaut pour éviter la navigation immédiate
                        event.preventDefault();

                        // Récupérez l'ID du message à partir de l'attribut de données
                        var messageId = button.getAttribute('data-message-id');

                        // Affichez une boîte de dialogue de confirmation
                        var confirmation = confirm("Êtes-vous sûr de vouloir supprimer ce message ?");

                        // Si l'utilisateur confirme, redirigez vers la page de suppression
                        if (confirmation) {
                            window.location.href = '<?= URL ?>delete_message_user/' + messageId;
                        }
                    });
                });
            });
        </script>

     </tbody>
    </table>
    