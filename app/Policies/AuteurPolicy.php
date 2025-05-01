<?php

namespace App\Policies;

use App\Models\Auteur;
use App\Models\User;

class AuteurPolicy
{

    public function create(User $user){
        return $user->account_type=="admin";
    }
    public function view(User $user){
        return $user->account_type=="admin";
    }
    public function edit(User $user,Auteur $auteur){
        return $user->account_type=="admin";
    }
    public function delete(User $user,Auteur $auteur){
        return $user->account_type=="admin";
    }
}
