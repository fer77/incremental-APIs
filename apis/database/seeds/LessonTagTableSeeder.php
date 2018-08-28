<?php

use App\Tag;
use App\Lesson;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
// use Laracasts\TestDummy\Factory as TestDummy;

class LessonTagTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $faker = Faker::create();

        $lessonIds = Lesson::pluck('id')->all(); // [1, 2, 3, 5, 7]
        $tagIds = Tag::pluck('id')->all();

        foreach(range(1, 10) as $index)
        {
            DB::table('lesson_tag')->insert([
                'lesson_id'  => $faker->randomElement($lessonIds),
                'tag_id'     => $faker->randomElement($tagIds)
            ]);
        }
    }
}
