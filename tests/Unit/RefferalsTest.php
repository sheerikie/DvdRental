<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RefferalsTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testRefferals()
    {
        //Given we have patient in the database
        $patient = factory('App\Refferals')->make()->toArray();

        $this->post('api/refferals/create', $patient);
        
       

    $this->assertDatabaseHas('check_ins', $patient);
    }
}
