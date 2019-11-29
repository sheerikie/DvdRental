<?php

namespace Tests\Unit\Model;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DvdTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testDvd()
    {
       //Given we have patient in the database
       $dvd = factory('App\Dvd')->make()->toArray();
       $this->post('api/dvd/create', $dvd)
            ->assertStatus(201)
            ->assertJson($dvd);
        $this->assertDatabaseHas('dvds', $dvd);
    }
    public function test_can_update_dvd() {
        $data = factory('App\Dvd')->make()->toArray();
        $this->put('api/dvd/create', $data->id, $data)
            ->assertStatus(200)
            ->assertJson($data);
    }
    public function test_can_show_dvd() {
        $item = factory('App\Dvd')->make()->toArray();
        $this->get(route('api/dvd/', $item->id))
            ->assertStatus(200);
    }
    public function test_can_delete_dvd() {
        $item = factory('App\Dvd')->make()->toArray();
        $this->delete(route('items.destroy', $item->id))
            ->assertStatus(204);
    }
}
