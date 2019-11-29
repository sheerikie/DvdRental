<?php

namespace Tests\Unit\Model;

use Tests\TestCase;
use App\Customer;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CustomerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_can_create_customer() {
        $data = factory('App\Customer')->make()->toArray();
        $this->post(route('customer.create'), $data)
            ->assertStatus(201)
            ->assertJson($data);
    }
    public function test_can_update_customer() {
        $data = factory('App\Customer')->make()->toArray();
      
        $this->put('api/customer/create', $data->id, $data)
            ->assertStatus(200)
            ->assertJson($data);
    }
    
    public function test_can_show_customer() {
        $item = factory('App\Customer')->make()->toArray();
        $this->get(route('api/customer/', $item->id))
            ->assertStatus(200);
    }
    public function test_can_delete_customer() {
        $item = factory('App\Customer')->make()->toArray();
        $this->delete(route('items.destroy', $item->id))
            ->assertStatus(204);
    }
}
