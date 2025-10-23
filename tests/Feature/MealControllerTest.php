<?php

namespace Tests\Feature;

use App\Models\FoodItem;
use App\Models\Meal;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class MealControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        // Create a user and authenticate
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
        Storage::fake('public');
    }

    /** @test */
    public function it_displays_the_meals_list()
    {
        Meal::factory()->count(3)->create();

        $response = $this->get(route('admin.meals.list'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.meals.list');
        $response->assertViewHas('meals');
    }

    /** @test */
    public function it_displays_the_create_meal_form()
    {
        FoodItem::factory()->count(3)->create();

        $response = $this->get(route('admin.meals.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.meals.create');
        $response->assertViewHas('foodItems');
    }

    /** @test */
    public function it_can_create_a_new_meal()
    {
        $foodItem = FoodItem::factory()->create();
        $file = UploadedFile::fake()->create('meal.jpg', 100);

        $data = [
            'name' => 'Test Meal',
            'description' => 'A delicious test meal',
            'notes' => 'Some cooking notes',
            'meal_time' => 'lunch',
            'preparation_time' => 30,
            'recipe_description' => 'Step by step recipe',
            'tags' => 'healthy,protein,quick',
            'image' => $file,
            'food_items' => [
                [
                    'food_id' => $foodItem->id,
                    'quantity' => 100,
                    'unit' => 'g'
                ]
            ]
        ];

        $response = $this->post(route('admin.meals.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('meals', ['name' => 'Test Meal']);
        $this->assertDatabaseHas('meal_food', [
            'food_id' => $foodItem->id,
            'quantity' => 100,
            'unit' => 'g'
        ]);
        $this->assertTrue(Storage::disk('public')->exists('meal_images/' . $file->hashName()));
    }

    /** @test */
    public function it_displays_the_edit_meal_form()
    {
        $meal = Meal::factory()->create();
        FoodItem::factory()->count(3)->create();

        $response = $this->get(route('admin.meals.edit', $meal->id));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.meals.edit');
        $response->assertViewHas('meal', $meal);
        $response->assertViewHas('foodItems');
    }

    /** @test */
    public function it_can_update_an_existing_meal()
    {
        $meal = Meal::factory()->create(['name' => 'Old Meal Name']);
        $foodItem = FoodItem::factory()->create();
        $file = UploadedFile::fake()->create('updated.jpg', 100);

        $data = [
            'name' => 'Updated Meal Name',
            'description' => 'Updated description',
            'notes' => 'Updated notes',
            'meal_time' => 'dinner',
            'preparation_time' => 45,
            'recipe_description' => 'Updated recipe',
            'tags' => 'updated,healthy',
            'image' => $file,
            'food_items' => [
                [
                    'food_id' => $foodItem->id,
                    'quantity' => 150,
                    'unit' => 'g'
                ]
            ]
        ];

        $response = $this->put(route('admin.meals.update', $meal->id), $data);

        $response->assertRedirect(route('admin.meals.show', $meal->id));
        $this->assertDatabaseHas('meals', ['name' => 'Updated Meal Name']);
        $this->assertTrue(Storage::disk('public')->exists('meal_images/' . $file->hashName()));
    }

    /** @test */
    public function it_can_delete_a_meal()
    {
        $meal = Meal::factory()->create();

        $response = $this->delete(route('admin.meals.destroy', $meal->id));

        $response->assertRedirect(route('admin.meals.list'));
        $this->assertDatabaseMissing('meals', ['id' => $meal->id]);
    }

    /** @test */
    public function it_displays_meal_details()
    {
        $meal = Meal::factory()->create();
        FoodItem::factory()->count(3)->create();

        $response = $this->get(route('admin.meals.show', $meal->id));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.meals.show');
        $response->assertViewHas('meal');
        $response->assertViewHas('availableFoodItems');
    }

    /** @test */
    public function it_can_add_ingredient_to_meal()
    {
        $meal = Meal::factory()->create();
        $foodItem = FoodItem::factory()->create();

        $data = [
            'food_item_id' => $foodItem->id,
            'quantity' => 200,
            'unit' => 'g'
        ];

        $response = $this->post(route('admin.meals.add-ingredient', $meal->id), $data);

        $response->assertRedirect(route('admin.meals.show', $meal->id));
        $this->assertDatabaseHas('meal_food', [
            'meal_id' => $meal->id,
            'food_id' => $foodItem->id,
            'quantity' => 200,
            'unit' => 'g'
        ]);
    }

    /** @test */
    public function it_can_remove_ingredient_from_meal()
    {
        $meal = Meal::factory()->create();
        $foodItem = FoodItem::factory()->create();
        
        // First add the ingredient
        $meal->foodItems()->attach($foodItem->id, [
            'quantity' => 100,
            'unit' => 'g'
        ]);

        $response = $this->delete(route('admin.meals.remove-ingredient', [$meal->id, $foodItem->id]));

        $response->assertRedirect(route('admin.meals.show', $meal->id));
        $this->assertDatabaseMissing('meal_food', [
            'meal_id' => $meal->id,
            'food_id' => $foodItem->id
        ]);
    }

    /** @test */
    public function it_filters_meals_by_search()
    {
        Meal::factory()->create(['name' => 'Chicken Salad']);
        Meal::factory()->create(['name' => 'Beef Steak']);
        Meal::factory()->create(['name' => 'Salmon Bowl']);

        $response = $this->get(route('admin.meals.list', ['search' => 'chicken']));

        $response->assertStatus(200);
        $response->assertViewHas('meals');
    }

    /** @test */
    public function it_filters_meals_by_meal_time()
    {
        Meal::factory()->create(['meal_time' => 'breakfast']);
        Meal::factory()->create(['meal_time' => 'lunch']);
        Meal::factory()->create(['meal_time' => 'dinner']);

        $response = $this->get(route('admin.meals.list', ['meal_times' => ['breakfast', 'lunch']]));

        $response->assertStatus(200);
        $response->assertViewHas('meals');
    }

    /** @test */
    public function it_filters_meals_by_calories_range()
    {
        Meal::factory()->create(['total_calories' => 200]);
        Meal::factory()->create(['total_calories' => 400]);
        Meal::factory()->create(['total_calories' => 600]);

        $response = $this->get(route('admin.meals.list', [
            'calories_min' => 300,
            'calories_max' => 500
        ]));

        $response->assertStatus(200);
        $response->assertViewHas('meals');
    }

    /** @test */
    public function it_can_save_meal()
    {
        $meal = Meal::factory()->create();

        $response = $this->post(route('meals.save', $meal->id));

        $response->assertRedirect();
        $this->assertDatabaseHas('saved_meals', [
            'user_id' => $this->user->id,
            'meal_id' => $meal->id
        ]);
    }

    /** @test */
    public function it_can_unsave_meal()
    {
        $meal = Meal::factory()->create();
        
        // First save the meal
        $meal->savedBy()->attach($this->user->id);

        $response = $this->delete(route('meals.unsave', $meal->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('saved_meals', [
            'user_id' => $this->user->id,
            'meal_id' => $meal->id
        ]);
    }
}
