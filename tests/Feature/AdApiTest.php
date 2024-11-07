<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Ad;
use App\Models\Branch;
use App\Models\Status;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AdApiTest extends TestCase
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
        User::factory()->create();
        Status::factory()->create();
        Branch::factory()->create();

        Ad::factory(3)->create();

        $response = $this->getJson('/api/ads');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_store_creates_new_ad()
    {
        User::factory()->create();
        Branch::factory()->create();
        Status::factory()->create();

        $response = $this->postJson('/api/ads', [
            'title' => 'test',
            'address' => 'test',
            'price' => 50,
            'rooms' => 5,
            'square' => 100,
            'description' => 'test',
            'user_id' => User::query()->first()->id,
            'branch_id' => Branch::query()->first()->id,
            'status_id' => Status::query()->first()->id,
            'gender' => 'male',
        ]);


        $response->assertStatus(201)
            ->assertJsonFragment(['title' => 'test']);
    }

    public function test_store_fails_with_invalid_data()
    {
        $response = $this->postJson('/api/ads', [
            'title' => '',
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('title');
    }

    public function test_show_returns_ad()
    {
        User::factory()->create();
        Branch::factory()->create();
        Status::factory()->create();

        $ad = Ad::factory()->create();

        $response = $this->getJson("/api/ads/{$ad->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['id' => $ad->id]);
    }

    public function test_show_fails_for_nonexistent_ad()
    {
        $response = $this->getJson('/api/ads/999');

        $response->assertStatus(404);
    }

    public function test_update_modifies_existing_ad()
    {
        User::factory()->create();
        Branch::factory()->create();
        Status::factory()->create();

        $ad = Ad::factory()->create();

        $response = $this->putJson("/api/ads/{$ad->id}", [
            'title' => 'test',
            'address' => 'test',
            'price' => 50,
            'rooms' => 5,
            'square' => 100,
            'description' => 'test',
            'user_id' => User::query()->first()->id,
            'branch_id' => Branch::query()->first()->id,
            'status_id' => Status::query()->first()->id,
            'gender' => 'male'
        ]);
        $response->assertStatus(200)
            ->assertJsonFragment(['title' => 'test']);
    }

    public function test_update_fails_with_invalid_data()
    {
        User::factory()->create();
        Branch::factory()->create();
        Status::factory()->create();

        $ad = Ad::factory()->create();

        $response = $this->putJson("/api/ads/{$ad->id}", [
            'title' => '',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('title');
    }

    public function test_destroy_removes_ad()
    {
        User::factory()->create();
        Branch::factory()->create();
        Status::factory()->create();

        $ad = Ad::factory()->create();

        $response = $this->deleteJson("/api/ads/{$ad->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('ads', ['id' => $ad->id]);
    }

    public function test_destroy_fails_for_nonexistent_ad()
    {
        $response = $this->deleteJson('/api/ads/999');

        $response->assertStatus(404);
    }
}
