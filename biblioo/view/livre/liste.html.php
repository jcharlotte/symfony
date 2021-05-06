<h2>Liste des livres</h2>
    
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Auteur</th>
                <th>actions</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($livres as $livre) : ?>
                <tr>
                    <td><?= $livre["id"] ?></td>
                    <td><?= $livre["titre"] ?></td>
                    <td><?= $livre["auteur"] ?></td>
                    <td>
                        <a href="?c=livre&m=modifier&i=<?= $livre["id"] ?>" >
                            <i class="fa fa-edit"></i>
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>