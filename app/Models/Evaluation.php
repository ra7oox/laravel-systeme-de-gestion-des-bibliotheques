<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evaluation extends Model
{
    public $table="evaluations";
    protected $fillable=["livre_id","lecteur_id","note"];
    public function livre(){
        return $this->belongsTo(livre::class,"livre_id");
    }
    public function lecteur(){
        return $this->belongsTo(livre::class,"lecteur_id");
    }
}
