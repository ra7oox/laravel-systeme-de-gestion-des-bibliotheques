<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Auteur extends Model
{
    public $table="auteurs";
    protected $fillable=["nom","prenom","nationalite"];
    public function livres(){
        return $this->hasMany(livre::class,"auteur_id");
    }
}
