<?php

namespace App\Models;

class Tag extends Model
{
    protected $table = 'tags';

    public function getAnimals()
    {
        return $this->query("
            SELECT a.* FROM animals a
            INNER JOIN animal_tag at ON at.animal_id = a.id
            WHERE at.tag_id = ?
        ", [$this->id]);
    }
}