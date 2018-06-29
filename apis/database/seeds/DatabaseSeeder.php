<?php

use App\Lesson;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Lesson::truncate();
        
        $this->call(LessonsTableSeeder::class);
    }
}
