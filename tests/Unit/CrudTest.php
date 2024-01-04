<?php

namespace Tests\Unit;

namespace Tests\Unit;
namespace Tests\Feature;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

use Tests\CreatesApplication;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CrudTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_crud(): void
    {
        $response = $this->get('/crud');
        $response=$this->call("POST","/crud",[
            "name"=>"hammad",
            "email"=>"hamad@gmail.com",
            "password"=> "admin123",

        ]);
        // dd($response);
        $response->assertStatus($response->status(),302);
    
        $response->assertViewIs("show");
    }
}
