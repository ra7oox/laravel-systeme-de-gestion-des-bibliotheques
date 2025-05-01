<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Livre extends Model
{
    public $table="livres";
    protected $fillable = ['titre', 'description', 'auteur_id'];

    public function auteur(){
        return $this->belongsTo(Auteur::class,"auteur_id");
    }
}
