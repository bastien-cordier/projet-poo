<!-- PAGE POUR LES ANIMAUX EN FONCTION DE LEURS RÉSERVATIONS OU NON -->

<!-- TAG DE RÉSERVATION -->
<h1 class="mt-3"><?= $params['tag']->name ?></h1>

<!-- CARD DE L'ANIMAL ET SES CARACTÉRISTIQUES -->
<?php foreach ($params['tag']->getAnimals() as $animal) : ?>
    <div class="card mb-3">
        <div class="card-body">
        <h2><?= $animal->name ?></h2>
            <p><b>Type :</b> <?= $animal->type ?><br/>
            <b>Race :</b> <?= $animal->race ?></p>
            <a href="/animals/<?= $animal->id ?>" class="btn btn-primary">Lire plus</a>
        </div>
    </div>
<?php endforeach ?>