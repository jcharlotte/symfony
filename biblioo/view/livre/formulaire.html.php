<h2>
    <?php if( !empty($livre) ) : ?>
        Modifier le livre n°<?= $livre->getId() ?>
    <?php else: ?>
        Ajouter un livre
    <?php endif ?>
</h2>

<form action="" method="post">
    <div class="form-group">
        <label for="titre">Titre</label>
        <input type="text" id="titre" name="titre" class="form-control" required value="<?= !empty($livre) ? $livre->getTitre() : "" ?>">
    </div>

    <div>
        <label for="auteur">Auteur</label>
        <input type="text" id="auteur" name="auteur" class="form-control" required value="<?= !empty($livre) ? $livre->getAuteur() : "" ?>">
    </div>

    <button class="btn btn-primary">Enregistrer</button>
    <a href="?c=livre&m=liste" class="btn btn-danger">Annuler</a>
</form>