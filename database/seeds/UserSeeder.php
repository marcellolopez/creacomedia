<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    public function run()
    {
        // Utiliza el factory para crear 10 usuarios (o la cantidad que desees)
        User::factory(10)->create();
    }
}
