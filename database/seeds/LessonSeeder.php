<?php

use Illuminate\Database\Seeder;
use App\Lesson;

class LessonSeeder extends Seeder
{
    public function run()
    {
        // Utiliza el factory para crear 20 lecciones (o la cantidad que desees)
        Lesson::factory(20)->create();
    }
}
