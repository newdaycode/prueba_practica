<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Role extends Model
{

	//ver cuáles usuarios poseen qué roles
    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }
}
