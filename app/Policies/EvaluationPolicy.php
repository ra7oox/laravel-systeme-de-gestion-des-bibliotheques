<?php

namespace App\Policies;

use App\Models\Evaluation;
use App\Models\User;

class EvaluationPolicy
{
    public function create(User $user){
        return $user->account_type=="lecteur";
    }
    public function edit(User $user,Evaluation $evaluation){
        return $user->account_type=="lecteur" && $evaluation->lecteur_id==$user->id;
    }
    public function delete(User $user,Evaluation $evaluation){
        return $user->account_type=="lecteur" && $evaluation->lecteur_id==$user->id;
    }

}
