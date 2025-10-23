<?php

namespace Tests\Feature;

use App\Models\Categorie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CategorieControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_displays_the_categories_list()
    {
        $user = User::factory()->create(['role' => 'admin']);
        Categorie::factory()->count(3)->create();

        $response = $this->actingAs($user)->get(route('admin.categories.list'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.categories.categories-list');
        $response->assertViewHas('categories');
    }

    /** @test */
    public function it_displays_the_create_categorie_form()
    {
        $user = User::factory()->create(['role' => 'admin']);

        $response = $this->actingAs($user)->get(route('admin.categories.add'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.categories.add-categorie');
    }

    /** @test */
    public function it_can_create_a_new_categorie()
    {
        $user = User::factory()->create(['role' => 'admin']);

        $data = [
            'nom' => 'Nouvelle Catégorie',
            'description' => 'Description test',
        ];

        $response = $this->actingAs($user)->post(route('admin.categories.store'), $data);

        $response->assertRedirect(route('admin.categories.list'));
        $this->assertDatabaseHas('categories', ['nom' => 'Nouvelle Catégorie']);
    }

    /** @test */
    public function it_displays_the_edit_categorie_form()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $categorie = Categorie::factory()->create();

        $response = $this->actingAs($user)->get(route('admin.categories.edit', $categorie->id));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.categories.edit-categorie');
        $response->assertViewHas('categorie', $categorie);
    }

    /** @test */
    public function it_can_update_an_existing_categorie()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $categorie = Categorie::factory()->create([
            'nom' => 'Ancien nom',
        ]);

        $data = [
            'nom' => 'Nom mis à jour',
            'description' => 'Nouvelle description',
        ];

        $response = $this->actingAs($user)->put(route('admin.categories.update', $categorie->id), $data);

        $response->assertRedirect(route('admin.categories.list'));
        $this->assertDatabaseHas('categories', ['nom' => 'Nom mis à jour']);
    }

    /** @test */
    public function it_can_delete_a_categorie()
    {
        $user = User::factory()->create(['role' => 'admin']);
        $categorie = Categorie::factory()->create();

        $response = $this->actingAs($user)->delete(route('admin.categories.destroy', $categorie->id));

        $response->assertRedirect(route('admin.categories.list'));
        $this->assertDatabaseMissing('categories', ['id' => $categorie->id]);
    }
}
