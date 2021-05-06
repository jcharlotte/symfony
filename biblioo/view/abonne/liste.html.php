
    <h2>Liste des abonnés</h2>
    
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>ID</th>
                <th>Pseudo</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($abonnes as $abonne) : ?>
                <tr>
                    <td><?= $abonne["id"] ?></td>
                    <td><?= $abonne["pseudo"] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>