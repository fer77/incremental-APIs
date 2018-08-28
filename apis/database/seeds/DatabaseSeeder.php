<?php

use App\Tag;
use App\Lesson;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    private $tables = [
        'lessons',
        'tags',
        'lesson_tag'
    ];
    
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        $this->cleanDatabase();

        Eloquent::unguard();
        
        $this->call(LessonsTableSeeder::class);
        $this->call(TagsTableSeeder::class);
        $this->call(LessonTagTableSeeder::class);
    }

    private function cleanDatabase()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        foreach ($this->tables as $tableName)
        {
            DB::table($tableName)->truncate();
        }

        DB::statement('SET FOREIGN_KEY_CHECKS=1');
    }
}
