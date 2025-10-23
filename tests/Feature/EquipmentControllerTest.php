<?php

namespace Tests\Feature;

use App\Models\Equipment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class EquipmentControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        // Crée un utilisateur admin et se connecte
        $this->admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($this->admin);
        Storage::fake('public'); // Pour gérer les uploads
    }

    /** @test */
    public function it_displays_the_equipment_list()
    {
        Equipment::factory()->count(3)->create();

        $response = $this->get(route('admin.equipments.list'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.equipments.list');
        $response->assertViewHas('equipments');
    }

    /** @test */
    public function it_displays_the_create_form()
    {
        $response = $this->get(route('admin.equipments.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.equipments.ajoute');
    }

    /** @test */
    public function it_can_create_a_new_equipment()
    {
        $file = UploadedFile::fake()->image('equip.png');

        $data = [
            'nom' => 'Tapis de course',
            'type' => 'cardio',
            'marque' => 'Nike',
            'etat' => 'neuf',
            'image' => $file,
            'description' => 'Pour courir à domicile',
        ];

        $response = $this->post(route('admin.equipments.store'), $data);

        $response->assertRedirect(route('admin.equipments.list'));
        $this->assertDatabaseHas('equipments', ['nom' => 'Tapis de course']);
        Storage::disk('public')->assertExists('equipments/' . $file->hashName());
    }

    /** @test */
    public function it_displays_the_edit_form()
    {
        $equipment = Equipment::factory()->create();

        $response = $this->get(route('admin.equipments.edit', $equipment->id));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.equipments.edit');
        $response->assertViewHas('equipment', $equipment);
    }

    /** @test */
    public function it_can_update_an_equipment()
    {
        $equipment = Equipment::factory()->create(['nom' => 'Ancien nom']);

        $file = UploadedFile::fake()->image('update.png');

        $data = [
            'nom' => 'Nouveau nom',
            'type' => $equipment->type,
            'marque' => $equipment->marque,
            'etat' => 'bon',
            'image' => $file,
            'description' => 'Description mise à jour',
        ];

        $response = $this->put(route('admin.equipments.update', $equipment->id), $data);

        $response->assertRedirect(route('admin.equipments.list'));
        $this->assertDatabaseHas('equipments', ['nom' => 'Nouveau nom']);
        Storage::disk('public')->assertExists('equipments/' . $file->hashName());
    }

    /** @test */
    public function it_can_delete_an_equipment()
    {
        $equipment = Equipment::factory()->create(['image' => 'equipments/fake.png']);
        Storage::disk('public')->put('equipments/fake.png', 'dummy content');

        $response = $this->delete(route('admin.equipments.destroy', $equipment->id));

        $response->assertRedirect(route('admin.equipments.list'));
        $this->assertDatabaseMissing('equipments', ['id' => $equipment->id]);
        Storage::disk('public')->assertMissing('equipments/fake.png');
    }
}
