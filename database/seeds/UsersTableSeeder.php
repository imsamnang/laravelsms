<?php

use Illuminate\Database\Seeder;
use App\User;
class UsersTableSeeder extends Seeder
{

    public function run()
    {
        User::create([
        	
        	'role_id'=>2,
        	'active'=>1,
        	'name'=>'User Phagna',
        	'username'=>'user',
        	'email'=>'user@gmail.com',
        	'password'=>bcrypt('Phagna@sa'),
        	'remember_token'=>str_random(10),

        	]);
    }
}
