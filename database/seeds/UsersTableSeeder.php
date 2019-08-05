<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() 
    {
        // creamos un usuario por defecto
        User::create([
        	'name'              => 'Jhonder Natera',
			'email'             => 'jhonder.natera@gmail.com',
			'email_verified_at' => now(),
			'password'          => bcrypt('123456'),
			'remember_token'    => Str::random(10)								
        ]);
    }
}
