<?php

namespace Tests\Feature;

use App\Models\FoodItem;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class FoodItemControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $admin;

    protected function setUp(): void
    {
        parent::setUp();
        // Create an admin user and authenticate
        $this->admin = User::factory()->create(['role' => 'admin']);
        $this->actingAs($this->admin);
        Storage::fake('public');
    }

    /** @test */
    public function it_displays_the_food_items_list()
    {
        FoodItem::factory()->count(3)->create();

        $response = $this->get(route('admin.food.list'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.food.food-list');
        $response->assertViewHas('foods');
    }

    /** @test */
    public function it_can_create_a_new_food_item()
    {
        $file = UploadedFile::fake()->create('food.jpg', 100);

        $data = [
            'name' => 'Test Food Item',
            'description' => 'A delicious test food',
            'calories' => 250,
            'protein' => 15.5,
            'fat' => 8.2,
            'carbs' => 30.0,
            'serving_size' => 100,
            'serving_type' => 'g',
            'image' => $file,
        ];

        $response = $this->post(route('admin.food.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('food_items', ['name' => 'Test Food Item']);
        $this->assertTrue(Storage::disk('public')->exists('food_images/' . $file->hashName()));
    }

    /** @test */
    public function it_displays_the_create_food_item_form()
    {
        $response = $this->get(route('admin.food.add'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.food.add-food');
    }

    /** @test */
    public function it_displays_the_edit_food_item_form()
    {
        $foodItem = FoodItem::factory()->create();

        $response = $this->get(route('admin.food.edit', $foodItem->id));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.food.edit-food');
        $response->assertViewHas('food', $foodItem);
    }

    /** @test */
    public function it_can_update_an_existing_food_item()
    {
        $foodItem = FoodItem::factory()->create(['name' => 'Old Name']);
        $file = UploadedFile::fake()->create('updated.jpg', 100);

        $data = [
            'name' => 'Updated Food Name',
            'description' => 'Updated description',
            'calories' => 300,
            'protein' => 20.0,
            'fat' => 10.0,
            'carbs' => 35.0,
            'serving_size' => 150,
            'serving_type' => 'g',
            'image' => $file,
        ];

        $response = $this->put(route('admin.food.update', $foodItem->id), $data);

        $response->assertRedirect(route('admin.food.show', $foodItem->id));
        $this->assertDatabaseHas('food_items', ['name' => 'Updated Food Name']);
        $this->assertTrue(Storage::disk('public')->exists('food_images/' . $file->hashName()));
    }

    /** @test */
    public function it_can_delete_a_food_item()
    {
        $foodItem = FoodItem::factory()->create();

        $response = $this->delete(route('admin.food.destroy', $foodItem->id));

        $response->assertRedirect(route('admin.food.list'));
        $this->assertDatabaseMissing('food_items', ['id' => $foodItem->id]);
    }

    /** @test */
    public function it_displays_food_item_details()
    {
        $foodItem = FoodItem::factory()->create();

        $response = $this->get(route('admin.food.show', $foodItem->id));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.food.food-show');
        $response->assertViewHas('food', $foodItem);
    }

    /** @test */
    public function it_filters_food_items_by_search()
    {
        FoodItem::factory()->create(['name' => 'Chicken Breast']);
        FoodItem::factory()->create(['name' => 'Beef Steak']);
        FoodItem::factory()->create(['name' => 'Salmon Fillet']);

        $response = $this->get(route('admin.food.list', ['search' => 'chicken']));

        $response->assertStatus(200);
        $response->assertViewHas('foods');
    }

    /** @test */
    public function it_filters_food_items_by_calories_range()
    {
        FoodItem::factory()->create(['calories' => 100]);
        FoodItem::factory()->create(['calories' => 300]);
        FoodItem::factory()->create(['calories' => 500]);

        $response = $this->get(route('admin.food.list', [
            'calories_min' => 200,
            'calories_max' => 400
        ]));

        $response->assertStatus(200);
        $response->assertViewHas('foods');
    }
}
