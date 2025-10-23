<?php

namespace Tests\Feature;

use App\Models\TypeEvent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class TypeEventControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Crée un admin pour accéder aux routes backoffice
        $this->admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($this->admin);
    }

    /** @test */
    public function it_displays_the_type_event_list()
    {
        TypeEvent::factory()->count(3)->create();

        $response = $this->get(route('admin.type_events.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.type_events.index');
        $response->assertViewHas('types');
    }

    /** @test */
    public function it_displays_the_create_form()
    {
        $response = $this->get(route('admin.type_events.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.type_events.create');
    }

    /** @test */
    public function it_can_create_a_new_type_event()
    {
        $data = [
            'name' => 'Musculation'
        ];

        $response = $this->post(route('admin.type_events.store'), $data);

        $response->assertRedirect(route('admin.type_events.index'));
        $this->assertDatabaseHas('type_events', ['name' => 'Musculation']);
    }

    /** @test */
    public function it_displays_the_edit_form()
    {
        $typeEvent = TypeEvent::factory()->create();

        $response = $this->get(route('admin.type_events.edit', $typeEvent->id));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.type_events.edit');
        $response->assertViewHas('typeEvent', $typeEvent);
    }

    /** @test */
    public function it_can_update_a_type_event()
    {
        $typeEvent = TypeEvent::factory()->create(['name' => 'Ancien Nom']);

        $data = ['name' => 'Nouveau Nom'];

        $response = $this->put(route('admin.type_events.update', $typeEvent->id), $data);

        $response->assertRedirect(route('admin.type_events.index'));
        $this->assertDatabaseHas('type_events', ['name' => 'Nouveau Nom']);
    }

    /** @test */
    public function it_can_delete_a_type_event()
    {
        $typeEvent = TypeEvent::factory()->create();

        $response = $this->delete(route('admin.type_events.destroy', $typeEvent->id));

        $response->assertRedirect(route('admin.type_events.index'));
        $this->assertDatabaseMissing('type_events', ['id' => $typeEvent->id]);
    }
}
