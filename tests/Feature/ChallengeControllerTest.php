<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Challenge;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ChallengeControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /** @test */
    public function index_displays_challenges()
    {
        Challenge::factory()->count(3)->create(['created_by' => $this->user->id]);

        $response = $this->get(route('challenges.index'));

        $response->assertStatus(200);
        $response->assertViewIs('frontoffice.challenges.index');
        $response->assertViewHas('allChallenges');
    }

    /** @test */
    public function create_displays_form()
    {
        $response = $this->get(route('challenges.create'));

        $response->assertStatus(200);
        $response->assertViewIs('frontoffice.challenges.create');
        $response->assertViewHas('users');
    }

    /** @test */
    public function store_creates_new_challenge()
    {
        Storage::fake('public');
        $file = UploadedFile::fake()->image('challenge.jpg');

        $data = [
            'titre' => 'Nouveau Challenge',
            'description' => 'Description du challenge',
            'dateDebut' => now()->addDay()->format('Y-m-d'),
            'dateFin' => now()->addDays(2)->format('Y-m-d'),
            'image' => $file,
        ];

        $response = $this->post(route('challenges.store'), $data);

        $response->assertRedirect(route('challenges.index'));
        $this->assertDatabaseHas('challenges', [
            'titre' => 'Nouveau Challenge',
            'created_by' => $this->user->id,
        ]);

        $challenge = Challenge::first();
        Storage::disk('public')->assertExists($challenge->image);
    }

    /** @test */
    public function destroy_deletes_challenge()
    {
        $challenge = Challenge::factory()->create(['created_by' => $this->user->id]);

        $response = $this->delete(route('challenges.destroy', $challenge));

        $response->assertRedirect(route('challenges.create'));
        $this->assertDatabaseMissing('challenges', ['id' => $challenge->id]);
    }

    /** @test */
    public function isParticipatedBy_returns_true_for_creator()
    {
        $challenge = Challenge::factory()->create(['created_by' => $this->user->id]);
        $this->assertTrue($challenge->isParticipatedBy($this->user->id));
    }
}
