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

class CrudControllerTest extends TestCase
{
    // use RefreshDatabase;
    /**
     * A basic unit test example.
     */
    public function test_create(): void
    {


        $userdata = [
            "name" => "hammadt",
            "email" => "hamadt@gmail.com",
            "password" => "admin123",

        ];

        $response = $this->post("/crud", $userdata);
        // dd($response);
        $response->assertStatus(302);
        // $this->assertDatabaseHas('users', [
        //     'name' => $userdata['name'],
        //     'email' => $userdata['email'],
        //     // Don't check for password because it will be hashed
        // ]);

    }
    public function test_view(): void
    {
        $response = $this->get('/crud');


        $response->assertViewIs("show");
    }
    public function test_edit(): void
    {
        $response = $this->get('/crud/create');


        $response->assertViewIs("create");
    }
    public function test_delete(): void
    {
        // First, create a user to delete
        $user = User::create([
            "name" => "Test User",
            "email" => "test@example.com",
            "password" => bcrypt("password123"),
        ]);

        // Then, make a DELETE request to the correct URL
        $response = $this->delete("/crud/{$user->id}");

        // You can check the response status or view
        $response->assertStatus(302); // Assuming a redirect occurs after successful deletion

        // Finally, assert the user was deleted from the database
        // $this->assertDatabaseMissing('users', [
        //     'id' => $user->id,
        // ]);
    }
    public function test_update(): void
    {
        // First, create a user to update
        $user = User::create([
            "name" => "Test User",
            "email" => "test@example.com",
            "password" => bcrypt("password123"),
        ]);

        // Then, prepare the updated user data
        $updatedUserData = [
            "name" => "Updated User",
            "email" => "updated@example.com",
            "password" => "updatedpassword123",
        ];

        // Make a PUT request to the correct URL
        $response = $this->put("/crud/{$user->id}", $updatedUserData);

        // You can check the response status or view
        $response->assertStatus(302); // Assuming a redirect occurs after successful update

        // Finally, assert the user was updated in the database
        // $this->assertDatabaseHas('users', [
        //     'id' => $user->id,
        //     'name' => $updatedUserData['name'],
        //     'email' => $updatedUserData['email'],
        //     // Don't check for password because it will be hashed
        // ]);
    }
}
