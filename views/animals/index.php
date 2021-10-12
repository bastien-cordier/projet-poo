<!-- PAGE CONSACRÉE À TOUS LES ANIMAUX -->
<h1 class="mt-3">Nos animaux</h1>
<?php foreach($params['animals'] as $animal): ?>
    <div class="card mb-3">
        <div class="card-body">
            <h2><?= $animal->name ?></h2>
            <div>
                <?php foreach ($animal->getTags() as $tag) : ?>
                    <span class="badge bg-info">Disponibilité : <a href="/tags/<?= $tag->id ?>"><?= $tag->name ?></a></span>
                <?php endforeach ?>
            </div>
            <small>Ajouté le : <?= $animal->getCreatedAt() ?></small>
            <br/><br/>
            <b>Type :</b> <?= $animal->type ?><br/>
            <b>Race :</b> <?= $animal->race ?></p>
            <a href="/animals/<?= $animal->id ?>" class="btn btn-primary">Lire plus</a>
        </div>
    </div>
<?php endforeach ?>