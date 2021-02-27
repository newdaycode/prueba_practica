<?php

use Illuminate\Database\Seeder;
use App\Role;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles_admin = Role::where('name', 'admin')->first();

        $user = new User();
        $user->names='admin';
        $user->last_names='admin';
        $user->phone='99999999';
        $user->email='admin@gmail.com';
        $user->password=bcrypt('claroInsurance.21');
        $user->identification='11111111111';
        $user->date_of_birth='1994-10-09';
        $user->cities_id=4;
        $user->save();
        $user->roles()->attach($roles_admin);


    }
}
