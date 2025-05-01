<?php

namespace App\Policies;

use App\Models\Livre;
use App\Models\User;

class LivrePolicy
{
    public function create(User $user){
        return $user->account_type=="admin";
    }
    public function edit(User $user,Livre $livre){
        return $user->account_type=="admin";
    }
    public function delete(User $user,Livre $livre){
        return $user->account_type=="admin";
    }
}
