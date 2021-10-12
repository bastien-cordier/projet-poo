<?php

namespace App\Controllers;

use App\Models\Model;
use App\Models\Tag;
use App\Models\Animal;

class AnimalsController extends Controller {

    // FONCTION POUR ENVOYER 3 ÉLÉMENTS SUR LA VUE HOMEPAGE
    public function welcome()
    {
        $animal = new Animal($this->getDB());
        $animals = $animal->threeElements();

        return $this->view('animals.welcome', compact('animals'));
    }

    // FONCTION POUR ENVOYER TOUS LES ANIMAUX SUR LA VUE ANIMAUX
    public function index()
    {
        $animal = new Animal($this->getDB());
        $animals = $animal->all();

        return $this->view('animals.index', compact('animals'));
    }

    // FONCTION POUR VOIR ANIMAL
    public function show(int $id)
    {
        $animal = new Animal($this->getDB());
        $animal = $animal->findById($id);

        return $this->view('animals.show', compact('animal'));
    }

    // FONCTION POUR VOIR TOUS LES PRODUITS APPARTENANT AU TAG
    public function tag(int $id)
    {
        $tag = (new Tag($this->getDB()))->findById($id);

        return $this->view('animals.tag', compact('tag'));
    }
}