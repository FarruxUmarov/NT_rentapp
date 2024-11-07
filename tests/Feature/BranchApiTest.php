<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Branch;
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
        Branch::factory(3)->create();

        $response = $this->getJson('/api/branches');

        $response->assertStatus(200)
            ->assertJsonCount(3);
    }

    public function test_store_creates_new_branch()
    {
        $response = $this->postJson('/api/branches', [
            "name" => "Bobur",
            "address" => "Bogazici University",
        ]);
        $response->assertStatus(201)
            ->assertJsonFragment(['name' => 'Bobur']);
    }

    public function test_store_fails_with_invalid_data()
    {
        $response = $this->postJson('/api/branches', [
            'name' => '',
        ]);
        $response->assertStatus(422)
            ->assertJsonValidationErrors('name');
    }

    public function test_show_returns_branch()
    {

        $branch = Branch::factory()->create();

        $response = $this->getJson("/api/branches/{$branch->id}");

        $response->assertStatus(200)
            ->assertJsonFragment(['name' => $branch->name]);
    }

    public function test_show_fails_for_nonexistent_branch()
    {
        $response = $this->getJson('/api/branches/999');

        $response->assertStatus(404);
    }

    public function test_update_modifies_existing_branch()
    {

        $branch = Branch::factory()->create();

        $response = $this->putJson("/api/branches/{$branch->id}", [
            'name' => 'Iskandar',
            'address' => 'Bogazici University'
        ]);
        $response->assertStatus(200)
            ->assertJsonFragment(['name' => 'Iskandar']);
    }

    public function test_update_fails_with_invalid_data()
    {
        $branch = Branch::factory()->create();

        $response = $this->putJson("/api/branches/{$branch->id}", [
            'name' => '',
        ]);

        $response->assertStatus(422)
            ->assertJsonValidationErrors('name');
    }

    public function test_destroy_removes_branch()
    {
        $branch = Branch::factory()->create();

        $response = $this->deleteJson("/api/branches/{$branch->id}");

        $response->assertStatus(204);
        $this->assertDatabaseMissing('branches', ['id' => $branch->id]);
    }

    public function test_destroy_fails_for_nonexistent_branch()
    {
        $response = $this->deleteJson('/api/branches/999');

        $response->assertStatus(404);
    }
}
