<?php

namespace App\Models;

use DateTime;

// CLASS QUI CONTIENT LES REQUÊTES D'UN ANIMAL
class Animal extends Model {

    protected $table = 'animals';

    // FONCTION QUI DONNE UN CERTAIN FORMAT À LA DATE
    public function getCreatedAt()
    {
        return (new DateTime($this->created_at))->format('d/m/Y');
    }

    // FONCTION QUI RÉCUPÈRE LES TAGS
    public function getTags()
    {
        return $this->query("
            SELECT t.* FROM tags t
            INNER JOIN animal_tag at ON at.tag_id = t.id
            WHERE at.animal_id = ?
        ", [$this->id]);
    }

    // FONCTION POUR CRÉER UN ANIMAL
    public function create(array $data, ?array $relations = null)
    {
        parent::create($data);

        $id = $this->db->getPDO()->lastInsertId();

        foreach ($relations as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT animal_tag (animal_id, tag_id) VALUES (?, ?)");
            $stmt->execute([$id, $tagId]);
        }

        return true;
    }

    // FONCTION POUR METTRE À JOUR L'ANIMAL
    public function update(int $id, array $data, ?array $relations = null)
    {
        parent::update($id, $data);

        $stmt = $this->db->getPDO()->prepare("DELETE FROM animal_tag WHERE animal_id = ?");
        $result = $stmt->execute([$id]);

        foreach ($relations as $tagId) {
            $stmt = $this->db->getPDO()->prepare("INSERT animal_tag (animal_id, tag_id) VALUES (?, ?)");
            $stmt->execute([$id, $tagId]);
        }

        if ($result) {
            return true;
        }

    }
}