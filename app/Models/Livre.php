<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillables = [
        'titre',
        'auteur',
    ];
    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }
}
