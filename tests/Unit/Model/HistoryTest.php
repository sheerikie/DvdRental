<?php

namespace Tests\Unit\Model;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class HistoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testHistory()
    {
        //Given we have patient in the database
        $dvd = factory('App\History')->make()->toArray();

        $this->post('api/history/create', $dvd)
        ->assertStatus(201)
             ->assertJson($dvd);
         $this->assertDatabaseHas('histories', $dvd);
    }
    public function test_can_update_history() {
        $data = factory('App\History')->make()->toArray();
        $this->put('api/history/create', $data->id, $data)
            ->assertStatus(200)
            ->assertJson($data);
    }
    public function test_can_show_dvd() {
        $item = factory('App\History')->make()->toArray();
        $this->get(route('api/history/', $item->id))
            ->assertStatus(200);
    }
    public function test_can_delete_dvd() {
        $item = factory('App\History')->make()->toArray();
        $this->delete(route('items.destroy', $item->id))
            ->assertStatus(204);
    }
}
