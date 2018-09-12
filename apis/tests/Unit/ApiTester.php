<?php

namespace Tests\Unit;

use Tests\TestCase;
use Faker\Factory as Faker;

class ApiTester extends TestCase {

    // protected $fake;
    protected $times = 1;

    function __construct()
    {
        // dd($this->fake = Faker::create());
        $this->fake = Faker::create();
        // dd($this->fake->boolean);
    }

    public function setUp()
    {
        parent::setUp();

        \Artisan::call('migrate');
    }

    protected function times($count)
    {
        $this->times = $count;

        return $this;
    }

    public function getJson($uri, array $headers = [])
    {
        return json_decode($this->call('GET, $uri')->getContent());
    }

    private function asserObjectHasAttributes()
    {
        $args = func_get_args();
        $object = array_shift($args);

        foreach($args as $attribute)
        {
            $this->asserObjectHasAttribute($attribute, $object);
        }
    }
}