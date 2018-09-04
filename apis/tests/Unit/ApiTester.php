<?php

namespace Tests\Unit;

use Tests\TestCase;
use Faker\Factory as Faker;

class ApiTester extends TestCase {

    protected $fake;
    protected $times = 1;

    // function __construct()
    // {
    //     $this->fake = Faker::create();
    // }

    public function setUp()
    {
        $this->fake = Faker::create();

        parent::setUp();

        \Artisan::call('migrate');
    }

    protected function times($count)
    {
        $this->times = $count;

        return $this;
    }

    public function getResponse($uri)
    {
        return json_decode($this->call('GET, $uri')->getContent());
    }

}