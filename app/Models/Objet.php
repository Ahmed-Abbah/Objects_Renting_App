<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Objet extends Model
{
    use HasFactory;
    public function categorie()
    {
        return $this->belongsTo(Categorie::class, 'id_categorie');
    }
}
