<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    protected $fillable = [
        'titre',
        'auteur',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Categorie::class);
    }
}
