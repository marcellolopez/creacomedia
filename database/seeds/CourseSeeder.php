<?php

// database/seeders/CourseSeeder.php

use Illuminate\Database\Seeder;
use App\Course;

class CourseSeeder extends Seeder
{
    public function run()
    {
        // Utiliza el factory para crear 10 cursos (o la cantidad que desees)
        Course::factory(10)->create();
    }
}
