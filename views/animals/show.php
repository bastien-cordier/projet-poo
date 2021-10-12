<!-- PAGE CONSACRÉ À L'ANIMAL -->

<!-- Nom de l'animal -->
<h1 class="mt-3"><?= $params['animal']->name ?></h1>

<!-- TAG DE RÉSERVATION DE L'ANIMAL -->
<h3><?php foreach ($params['animal']->getTags() as $tag) : ?>
        <span class="badge bg-info"><a href="/tags/<?= $tag->id ?>"><?= $tag->name ?></a></span>
    <?php endforeach ?></h3><br/>

<!-- DATE D'ARRIVÉE DE L'ANIMAL -->
<p><?= $params['animal']->name ?> est arrivé le <?= $params['animal']->getCreatedAt() ?></p>
<hr/>
    
<!-- CARACTÉRISTIQUES DE L'ANIMAL -->
<p>
    <b>Type d'animal :</b> <?= $params['animal']->type ?><br/>
    <b>Race de l'animal :</b> <?= $params['animal']->race ?>
</p>
<p><b>Description :</b> <?= $params['animal']->description ?></p>
<hr/>
<a href="mailto:refuganimaux@gmail.com"><button class="btn btn-primary me-3"><span class="text-white">Contactez-nous pour réserver <?= $params['animal']->name ?></span></a></button><a href="/animals" class="btn btn-secondary">Retourner à nos animaux</a>