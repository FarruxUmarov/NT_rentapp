<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class StatusApiTest extends TestCase
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
        Status::factory(3)->create();

        $response = $this->getJson('/api/statuses');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_store_creates_new_status()
    {
        $response = $this->postJson('/api/statuses', [
            'status' => 'active',
        ]);
        $response->assertStatus(201)
            ->assertJsonFragment(['status' => 'active']);
    }

    public function test_store_fails_with_invalid_data()
    {
        $response = $this->postJson('/api/statuses', [
            'status' => '',
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('status');
    }

    public function test_show_returns_status()
    {

        $status = Status::factory()->create();

        $response = $this->getJson("/api/statuses/{$status->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['status' => $status->status]);
    }

    public function test_show_fails_for_nonexistent_status()
    {
        $response = $this->getJson('/api/statuses/999');

        $response->assertStatus(404);
    }

    public function test_update_modifies_existing_status()
    {

        $status = Status::factory()->create();

        $response = $this->putJson("/api/statuses/{$status->id}", [
            'status' => 'active',
        ]);
        $response->assertStatus(200)
            ->assertJsonFragment(['status' => 'active']);
    }

    public function test_update_fails_with_invalid_data()
    {
        $status = Status::factory()->create();

        $response = $this->putJson("/api/statuses/{$status->id}", [
            'status' => '',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('status');
    }

    public function test_destroy_removes_status()
    {
        $status = Status::factory()->create();

        $response = $this->deleteJson("/api/statuses/{$status->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('statuses', ['id' => $status->id]);
    }

    public function test_destroy_fails_for_nonexistent_status()
    {
        $response = $this->deleteJson('/api/statuses/999');

        $response->assertStatus(404);
    }
}
