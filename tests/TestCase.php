<?php

namespace Tests;

use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Artisan;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;
    protected $faker;


    public function setUp():void
    {
        parent::setUp();
        $this->faker = Faker::create();

        Artisan::call("migrate");
    }


    public function tearDown(): void
    {
        Artisan::call('migrate:rollback');
        parent::tearDown();
    }

}
