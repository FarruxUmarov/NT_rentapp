<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class BranchApiTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();

        $user = User::factory()->create();
        Sanctum::actingAs($user);
    }

    public function test_index_returns_successful_response()
    {
        User::factory(3)->create();

        $response = $this->getJson('/api/users');

        $response->assertStatus(200)
            ->assertJsonCount(4);
    }

    public function test_store_creates_new_user()
    {
        $response = $this->postJson('/api/users', [
            "name" => "Bobur",
            "email" => "bobr@exeasd.com",
            "password" => "12345678",
            "phone" => "1234567890",
            "gender" => "male",
            "position" => "hello world",
        ]);
        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'Bobur']);
    }

//    public function test_store_fails_with_invalid_data()
//    {
//        $response = $this->postJson('/api/users', [
//            'name' => '',
//        ]);
//        $response->assertStatus(422)
//            ->assertJsonValidationErrors('name');
//    }

    public function test_show_returns_user()
    {

        $user = User::factory()->create();

        $response = $this->getJson("/api/users/{$user->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $user->name]);
    }

    public function test_show_fails_for_nonexistent_user()
    {
        $response = $this->getJson('/api/users/999');

        $response->assertStatus(404);
    }

    public function test_update_modifies_existing_user()
    {

        $user = User::factory()->create();

        $response = $this->putJson("/api/users/{$user->id}", [
            'name' => 'Iskandar',
            'email' => "iskanda@mail.com",
            'password' => "12345678",
            'phone' => "1234567899",
            'gender' => "male",
            'position' => "hello"
        ]);
        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Iskandar']);
    }

    public function test_update_fails_with_invalid_data()
    {
        $user = User::factory()->create();

        $response = $this->putJson("/api/users/{$user->id}", [
            'name' => '',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('name');
    }

    public function test_destroy_removes_user()
    {
        $user = User::factory()->create();

        $response = $this->deleteJson("/api/users/{$user->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('users', ['id' => $user->id]);
    }

    public function test_destroy_fails_for_nonexistent_user()
    {
        $response = $this->deleteJson('/api/users/999');

        $response->assertStatus(404);
    }
}
