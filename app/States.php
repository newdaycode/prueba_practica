<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
	//relacion de una a varias
    public function salas()
    {
        return $this->hasMany('App\Cities', 'states_id');
    }
}
