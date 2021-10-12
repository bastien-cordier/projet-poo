<!-- PAGE ADMIN -->
<h1 class="mt-3">Administration des animaux</h1>

<!-- MESSAGE DE SUCCESS LORSQUE JE ME CONNECTE -->
<?php if(isset($_GET['success'])): ?>
    <div class="alert alert-success">Vous êtes connecté!</div>
<?php endif ?>

<!-- BOUTON POUR ACCÉDER AU FORMULAIRE D'AJOUT D'ANIMAUX -->
<a href="/admin/animals/create" class="btn btn-primary my-3">Ajouter un animal</a>

<!-- TABLEAU DE TOUS LES ANIMAUX PRÉSENTS DANS LE REFUGE ET LES ACTIONS D'EDIT ET DELETE -->
<table class="table">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nom</th>
            <th scope="col">Type</th>
            <th scope="col">Race</th>
            <th scope="col">Ajouté le</th>
            <th scope="col">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($params['animals'] as $animal) : ?>
            <tr>
                <th scope="row"><?= $animal->id ?></th>
                <td><?= $animal->name ?></td>
                <td><?= $animal->type ?></td>
                <td><?= $animal->race ?></td>
                <td><?= $animal->getCreatedAt() ?></td>
                <td>
                    <a href="/admin/animals/edit/<?= $animal->id ?>" class="btn btn-warning">Modifier</a>
                    <form action="/admin/animals/delete/<?= $animal->id ?>" method="POST" class="d-inline">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
        <?php endforeach ?>
    </tbody>
</table>