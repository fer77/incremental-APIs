<?php

use App\Tag;
use Faker\Factory as Faker;
use Illuminate\Database\Seeder;

// composer require laracasts/testdummy
// use Laracasts\TestDummy\Factory as TestDummy;

class TagsTableSeeder extends Seeder
{
    public function run()
    {
        // TestDummy::times(20)->create('App\Post');
        $faker = Faker::create();
        foreach(range(1, 30) as $index)
        {
            Tag::create([
                'name' => $faker->word
            ]);
        }
    }
}
