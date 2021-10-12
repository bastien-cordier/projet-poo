<!-- HOMEPAGE -->
<h1 class="text-center mt-5">Homepage</h1>
<p class="text-center my-5">
    Refug'Animaux est un refuge fondé en 2010 pour préserver les animaux abandonnés.<br/>
    Grâce à l'aide d'une association de vétérinaires nous soignons les animaux pour qu'ils soient en pleine santé<br/>et que leurs prochains maîtres s'en occupent sans contraintes.
</p>

<div class="container my-5">
    <div class="row text-center">
        <div class="col-md-4">
            <a href="/animals"><button class="btn btn-success">Voir tous nos animaux</button></a>
        </div>
        <div class="col-md-4">
            <a href="/tags/10"><button class="btn btn-success">Voir tous nos animaux disponibles</button></a>
        </div>
        <div class="col-md-4">
            <a href="/tags/9"><button class="btn btn-success">Voir tous nos animaux non disponibles</button></a>
        </div>
    </div>
</div>

<hr/>

<!-- LISTE DES 3 DERNIERS ANIMAUX ARRIVÉS -->
<h3 class="text-center">Nos 3 derniers animaux arrivés</h3>
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
