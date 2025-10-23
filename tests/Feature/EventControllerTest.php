<?php

namespace Tests\Feature;

use App\Models\Event;
use App\Models\TypeEvent;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EventControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Crée un admin et se connecte
        $this->admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($this->admin);

        // Crée un TypeEvent pour les relations
        $this->typeEvent = TypeEvent::factory()->create();
    }

    /** @test */
    public function it_displays_the_event_list()
    {
        Event::factory()->count(3)->create(['type_event_id' => $this->typeEvent->id]);

        $response = $this->get(route('admin.events.index'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.events.index');
        $response->assertViewHas('events');
    }

    /** @test */
    public function it_displays_the_create_form()
    {
        $response = $this->get(route('admin.events.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.events.create');
        $response->assertViewHas('types');
    }

    /** @test */
    public function it_can_create_a_new_event()
    {
        $data = [
            'title' => 'Événement Test',
            'location' => 'Paris',
            'date' => now()->addDays(5)->format('Y-m-d'),
            'description' => 'Description test',
            'type_event_id' => $this->typeEvent->id,
        ];

        $response = $this->post(route('admin.events.store'), $data);

        $response->assertRedirect(route('admin.events.index'));
        $this->assertDatabaseHas('events', ['title' => 'Événement Test']);
    }

    /** @test */
    public function it_displays_the_edit_form()
    {
        $event = Event::factory()->create(['type_event_id' => $this->typeEvent->id]);

        $response = $this->get(route('admin.events.edit', $event->id));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.events.edit');
        $response->assertViewHas('event', $event);
        $response->assertViewHas('types');
    }

    /** @test */
    public function it_can_update_an_event()
    {
        $event = Event::factory()->create(['title' => 'Ancien Titre', 'type_event_id' => $this->typeEvent->id]);

        $data = [
            'title' => 'Titre Mis à Jour',
            'location' => $event->location,
            'date' => now()->addDays(10)->format('Y-m-d'),
            'description' => 'Nouvelle description',
            'type_event_id' => $this->typeEvent->id,
        ];

        $response = $this->put(route('admin.events.update', $event->id), $data);

        $response->assertRedirect(route('admin.events.index'));
        $this->assertDatabaseHas('events', ['title' => 'Titre Mis à Jour']);
    }

    /** @test */
    public function it_can_delete_an_event()
    {
        $event = Event::factory()->create(['type_event_id' => $this->typeEvent->id]);

        $response = $this->delete(route('admin.events.destroy', $event->id));

        $response->assertRedirect(route('admin.events.index'));
        $this->assertDatabaseMissing('events', ['id' => $event->id]);
    }

    /** @test */
    public function front_index_displays_paginated_events()
    {
        Event::factory()->count(10)->create(['type_event_id' => $this->typeEvent->id]);

        $response = $this->get(route('events.front'));

        $response->assertStatus(200);
        $response->assertViewIs('frontoffice.events.index');
        $response->assertViewHas('events');
    }

    /** @test */
    public function participate_adds_user_and_returns_qrcode()
    {
        $user = User::factory()->create();
        $this->actingAs($user);

        $event = Event::factory()->create(['type_event_id' => $this->typeEvent->id]);

        $response = $this->post(route('events.participate', $event->id));

        $response->assertRedirect();
        $response->assertSessionHas('success');
        $response->assertSessionHas('qrCode');
        $this->assertTrue($event->fresh()->isParticipating($user->id));
    }
}
