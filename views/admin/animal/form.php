<!-- PAGE FORMULAIRE POUR L'EDITION OU L'AJOUT D'UN ANIMAL GRACE À LA CONCATÉNACTION -->
<h1 class="mt-3"><?= $params['animal']->name ?? 'Ajouter votre animal' ?></h1>

<form action="<?= isset($params['animal']) ? "/admin/animals/edit/{$params['animal']->id}" : "/admin/animals/create" ?>" method="POST">
    <div class="form-group">
        <label for="name">Nom de l'animal</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $params['animal']->name ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="type">Type d'animal</label>
        <input type="text" class="form-control" name="type" id="type" value="<?= $params['animal']->type ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="race">Race de l'animal</label>
        <input type="text" class="form-control" name="race" id="race" value="<?= $params['animal']->race ?? '' ?>">
    </div>
    <div class="form-group">
        <label for="description">Description de l'animal</label>
        <textarea name="description" id="description" class="form-control"><?= $params['animal']->description ?? '' ?></textarea>
    </div>
    <div class="form-group">
        <label for="tags">Sélection des tags</label>
        <select class="form-select" id="tags" name="tags[]">
            <?php foreach($params['tags'] as $tag) : ?>
                <option value="<?= $tag->id ?>"
                <?php if (isset($params['animal'])) : ?>
                <?php foreach($params['animal']->getTags() as $animalTag) {
                    echo ($tag->id === $animalTag->id) ? 'selected' : '';
                }?>
                <?php endif ?>><?= $tag->name ?></option>
            <?php endforeach ?>
        </select>
    </div><br/>
    <button type="submit" class="btn btn-success"><?= isset($params['animal']) ?'Enregistrer les modifications' : 'Ajouter mon animal' ?></button>
</form>