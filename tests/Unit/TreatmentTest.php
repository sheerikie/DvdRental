<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class TreatmentTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTreatment()
    {
        //Given we have patient in the database
        $patient = factory('App\Treatment')->make()->toArray();

        $this->post('api/treatment/create', $patient);
        
      

    $this->assertDatabaseHas('check_ins', $patient);
    }
}
