<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Produit;
use App\Models\Categorie;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Auth\Authenticatable;

class ProduitControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Crée un utilisateur et l'authentifie pour tous les tests
        $user = User::factory()->create();
        $this->actingAs($user);
    }

    /** @test */
    public function it_displays_the_products_list()
    {
        $categorie = Categorie::factory()->create();
        Produit::factory()->count(3)->create(['categorie_id' => $categorie->id]);

        $response = $this->get(route('admin.produits.list'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.produits.produits-list');
        $response->assertViewHas('produits');
    }

    /** @test */
    public function it_can_create_a_new_product()
    {
        Storage::fake('public');

        $categorie = Categorie::factory()->create();

        $response = $this->post(route('admin.produits.store'), [
            'nom' => 'Ballon test',
            'description' => 'Super ballon',
            'prix' => 100,
            'stock' => 10,
            'categorie_id' => $categorie->id,
            'image' => UploadedFile::fake()->image('ballon.jpg'),
        ]);

        $response->assertRedirect(route('admin.produits.list'));

        $this->assertDatabaseHas('produits', ['nom' => 'Ballon test']);
    }

    /** @test */
    public function it_can_update_an_existing_product()
    {
        Storage::fake('public');

        $categorie = Categorie::factory()->create();
        $produit = Produit::factory()->create(['categorie_id' => $categorie->id]);

        $response = $this->put(route('admin.produits.update', $produit->id), [
            'nom' => 'Nouveau nom',
            'description' => 'Description mise à jour',
            'prix' => 200,
            'stock' => 15,
            'categorie_id' => $categorie->id,
        ]);

        $response->assertRedirect(route('admin.produits.list'));
        $this->assertDatabaseHas('produits', ['nom' => 'Nouveau nom']);
    }

    /** @test */
    public function it_can_delete_a_product()
    {
        Storage::fake('public');

        $categorie = Categorie::factory()->create();
        $produit = Produit::factory()->create(['categorie_id' => $categorie->id]);

        $response = $this->delete(route('admin.produits.destroy', $produit->id));

        $response->assertRedirect(route('admin.produits.list'));
        $this->assertDatabaseMissing('produits', ['id' => $produit->id]);
    }
}
