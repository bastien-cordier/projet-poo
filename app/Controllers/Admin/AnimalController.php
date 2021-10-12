<?php
namespace App\Controllers\Admin;

use App\Models\Tag;
use App\Models\Animal;
use App\Controllers\Controller;

class AnimalController extends Controller {

    // FONCTION RÉCUPÉRER TOUS LES ANIMAUX SUR LA PAGE D'ADMINISTRATION
    public function index()
    {
        $this->isAdmin();

        $animals = (new Animal($this->getDB()))->all();

        return $this->view('admin.animal.index', compact('animals'));
    }

    // FONCTION RÉCUPÉRER LES TAGS RÉSERVÉ OU NON
    public function create()
    {
        $this->isAdmin();

        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.animal.form', compact('tags'));
    }

    // FONCTION CRÉER L'ANIMAL
    public function createAnimal()
    {
        $this->isAdmin();

        $animal = new Animal($this->getDB());

        $tags = array_pop($_POST);

        $result = $animal->create($_POST, $tags);

        if ($result) {
            return header('Location: /admin/animals');
        }
    }

    public function edit(int $id)
    {
        $this->isAdmin();

        $animal = (new Animal($this->getDB()))->findById($id);
        $tags = (new Tag($this->getDB()))->all();

        return $this->view('admin.animal.form', compact('animal', 'tags'));
    }


    // FONCTION METTRE À JOUR L'ANIMAL
    public function update(int $id)
    {
        $this->isAdmin();

        $animal = new Animal($this->getDB());

        $tags = array_pop($_POST);

        $result = $animal->update($id, $_POST, $tags);

        if ($result) {
            return header('Location: /admin/animals');
        }
    }


    // FONCTION SUPPRIMER L'ANIMAL
    public function destroy(int $id)
    {
        $this->isAdmin();
        
        $animal = new Animal($this->getDB());
        $result = $animal->destroy($id);

        if ($result) {
            return header('Location: /admin/animals');
        }
    }
}