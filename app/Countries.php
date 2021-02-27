<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Countries extends Model
{
    
    //relacion de una a varias
    public function states()
    {
        return $this->hasMany('App\states', 'countries_id');
    }

	//relacion de una a varias
    public function Cities()
    {
        return $this->hasMany('App\Cities', 'states_id');
    }

}
