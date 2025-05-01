<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lecteur extends Model
{
    public $table="lecteurs";
    protected $fillable=["nom","prenom","email"];
    public function emprunts(){
        return $this->hasMany(Emprunt::class,"lecteur_id");
    }
}
