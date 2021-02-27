<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Role;
use App\Cities;
use App\Countries;
use App\States;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'names','last_names','email','phone','password','identification','date_of_birth','cities_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    //método que indica la relación
    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public function authorizeRoles($roles)
    {
        abort_unless($this->hasAnyRole($roles), 401);
        return true;
    }
    public function hasAnyRole($roles)
    {
        //si recibo varios roles
        if (is_array($roles)) {
            foreach ($roles as $role) {
                if ($this->hasRole($role)) {
                    return true;
                }
            }
        } else {//si es un solo rol
            if ($this->hasRole($roles)) {
                 return true; 
            }   
        }
        return false;
    }
    
    //se encarga de validar si el usuario tiene relacionado un rol
    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }


    public static function usuarios(){
         

        //datos de usuarios con su ubicacion
        return $usuarios= Countries::join('states', 'states.countries_id', '=', 'countries.id')
            ->join('cities', 'cities.states_id', '=', 'states.id')
            ->join('users', 'users.cities_id', '=', 'cities.id')
            ->select('users.names as nombres','users.last_names as apellidos', 'users.email as email', 'users.phone as telefono', 'users.identification as identificacion', 'users.date_of_birth as fecha', 'cities.city_name as ciudad', 'states.state_name as estado', 'countries.country_name as pais', 'users.id as codigo');


    }

    

}
