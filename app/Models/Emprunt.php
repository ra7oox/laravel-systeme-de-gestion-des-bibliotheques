<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Emprunt extends Model
{
    public $table="emprunts";
    protected $fillable=["livre_id","lecteur_id","date_emprunt","date_retour"];
    public function livre(){
        return $this->belongsTo(livre::class,"livre_id");
    }
    public function lecteur(){
        return $this->belongsTo(livre::class,"lecteur_id");
    }
}
