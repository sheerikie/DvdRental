<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
//use Illuminate\Foundation\Testing\DatabaseMigrations;

class CheckInTest extends TestCase
{

    use RefreshDatabase;
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testCheckIn()
    {
        //Given we have patient in the database
        $patient = factory('App\CheckIn')->make()->toArray();

        $this->post('api/checkIn/create', $patient);
        
       

    $this->assertDatabaseHas('check_ins', $patient);
    }
}
