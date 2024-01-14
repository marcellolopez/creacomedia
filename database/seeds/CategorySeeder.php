<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    public function run()
    {
        // Utiliza el factory para crear 10 categorías (o la cantidad que desees)
        Category::factory(10)->create();
    }
} 