<h1>Bienvenue à la bibliothéque</h1>
        <h2>Liste des livres</h2>

        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Auteur</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($livres as $livre) : ?>
                    <tr>
                        <td><?= $livre["id"] ?></td>
                        <td><?= $livre["titre"] ?></td>
                        <td><?= $livre["auteur"] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>