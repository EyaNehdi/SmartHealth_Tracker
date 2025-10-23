<?php

namespace Tests\Feature;

use App\Models\Meal;
use App\Models\MealPlan;
use App\Models\MealPlanAssignment;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class MealPlanControllerTest extends TestCase
{
    use RefreshDatabase;

    protected $user;

    protected function setUp(): void
    {
        parent::setUp();
        // Create a user and authenticate
        $this->user = User::factory()->create();
        $this->actingAs($this->user);
    }

    /** @test */
    public function it_displays_the_meal_plans_list()
    {
        MealPlan::factory()->count(3)->create();

        $response = $this->get(route('admin.meal-plans.list'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.meal-plans.list');
        $response->assertViewHas('mealPlans');
    }

    /** @test */
    public function it_displays_the_create_meal_plan_form()
    {
        Meal::factory()->count(3)->create();

        $response = $this->get(route('admin.meal-plans.create'));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.meal-plans.meal-plan-form');
        $response->assertViewHas('meals');
    }

    /** @test */
    public function it_can_create_a_new_meal_plan()
    {
        $meal1 = Meal::factory()->create();
        $meal2 = Meal::factory()->create();

        $data = [
            'name' => 'Test Meal Plan',
            'description' => 'A comprehensive meal plan for testing',
            'total_days' => 1,
            'assignments' => [
                [
                    'meal_id' => $meal1->id,
                    'day_number' => 1,
                    'meal_time' => 'breakfast'
                ],
                [
                    'meal_id' => $meal2->id,
                    'day_number' => 1,
                    'meal_time' => 'lunch'
                ]
            ]
        ];

        $response = $this->post(route('admin.meal-plans.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('meal_plans', ['name' => 'Test Meal Plan']);
        $this->assertDatabaseHas('meal_plan_assignments', [
            'meal_id' => $meal1->id,
            'day_number' => 1,
            'meal_time' => 'breakfast'
        ]);
    }

    /** @test */
    public function it_displays_the_edit_meal_plan_form()
    {
        $mealPlan = MealPlan::factory()->create();
        Meal::factory()->count(3)->create();

        $response = $this->get(route('admin.meal-plans.edit', $mealPlan->id));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.meal-plans.meal-plan-form');
        $response->assertViewHas('mealPlan', $mealPlan);
        $response->assertViewHas('meals');
    }

    /** @test */
    public function it_can_update_an_existing_meal_plan()
    {
        $mealPlan = MealPlan::factory()->create(['name' => 'Old Meal Plan']);
        $meal1 = Meal::factory()->create();
        $meal2 = Meal::factory()->create();

        $data = [
            'name' => 'Updated Meal Plan',
            'description' => 'Updated description',
            'total_days' => 2,
            'assignments' => [
                [
                    'meal_id' => $meal1->id,
                    'day_number' => 1,
                    'meal_time' => 'breakfast'
                ],
                [
                    'meal_id' => $meal2->id,
                    'day_number' => 2,
                    'meal_time' => 'dinner'
                ]
            ]
        ];

        $response = $this->put(route('admin.meal-plans.update', $mealPlan->id), $data);

        $response->assertRedirect(route('admin.meal-plans.show', $mealPlan->id));
        $this->assertDatabaseHas('meal_plans', ['name' => 'Updated Meal Plan']);
    }

    /** @test */
    public function it_can_delete_a_meal_plan()
    {
        $mealPlan = MealPlan::factory()->create();

        $response = $this->delete(route('admin.meal-plans.destroy', $mealPlan->id));

        $response->assertRedirect(route('admin.meal-plans.list'));
        $this->assertDatabaseMissing('meal_plans', ['id' => $mealPlan->id]);
    }

    /** @test */
    public function it_displays_meal_plan_details()
    {
        $mealPlan = MealPlan::factory()->create();

        $response = $this->get(route('admin.meal-plans.show', $mealPlan->id));

        $response->assertStatus(200);
        $response->assertViewIs('backoffice.meal-plans.show');
        $response->assertViewHas('mealPlan');
    }

    /** @test */
    public function it_can_toggle_meal_plan_active_status()
    {
        $mealPlan = MealPlan::factory()->create(['is_active' => false]);

        $response = $this->patch(route('admin.meal-plans.toggle-active', $mealPlan->id));

        $response->assertRedirect();
        $this->assertTrue($mealPlan->fresh()->is_active);
    }

    /** @test */
    public function it_can_remove_meal_assignment()
    {
        $mealPlan = MealPlan::factory()->create();
        $meal = Meal::factory()->create();
        $assignment = MealPlanAssignment::factory()->create([
            'meal_plan_id' => $mealPlan->id,
            'meal_id' => $meal->id,
            'day_number' => 1,
            'meal_time' => 'breakfast'
        ]);

        $response = $this->delete(route('admin.meal-plans.remove-assignment', [$mealPlan->id, $assignment->id]));

        $response->assertRedirect();
        $this->assertDatabaseMissing('meal_plan_assignments', ['id' => $assignment->id]);
    }

    /** @test */
    public function it_filters_meal_plans_by_search()
    {
        MealPlan::factory()->create(['name' => 'Weight Loss Plan']);
        MealPlan::factory()->create(['name' => 'Muscle Gain Plan']);
        MealPlan::factory()->create(['name' => 'Maintenance Plan']);

        $response = $this->get(route('admin.meal-plans.list', ['search' => 'weight']));

        $response->assertStatus(200);
        $response->assertViewHas('mealPlans');
    }

    /** @test */
    public function it_filters_meal_plans_by_status()
    {
        MealPlan::factory()->create(['is_active' => true]);
        MealPlan::factory()->create(['is_active' => false]);
        MealPlan::factory()->create(['is_active' => true]);

        $response = $this->get(route('admin.meal-plans.list', ['statuses' => ['active']]));

        $response->assertStatus(200);
        $response->assertViewHas('mealPlans');
    }

    /** @test */
    public function it_filters_meal_plans_by_days_range()
    {
        MealPlan::factory()->create(['total_days' => 3]);
        MealPlan::factory()->create(['total_days' => 7]);
        MealPlan::factory()->create(['total_days' => 14]);

        $response = $this->get(route('admin.meal-plans.list', [
            'min_days' => 5,
            'max_days' => 10
        ]));

        $response->assertStatus(200);
        $response->assertViewHas('mealPlans');
    }

    /** @test */
    public function front_index_displays_active_meal_plans()
    {
        MealPlan::factory()->create(['is_active' => true]);
        MealPlan::factory()->create(['is_active' => false]);
        MealPlan::factory()->create(['is_active' => true]);

        $response = $this->get(route('meal-plans.front.index'));

        $response->assertStatus(200);
        $response->assertViewIs('frontoffice.meal-plans.index');
        $response->assertViewHas('mealPlans');
    }

    /** @test */
    public function front_show_displays_meal_plan_details()
    {
        $mealPlan = MealPlan::factory()->create(['is_active' => true]);

        $response = $this->get(route('meal-plans.front.show', $mealPlan->id));

        $response->assertStatus(200);
        $response->assertViewIs('frontoffice.meal-plans.show');
        $response->assertViewHas('mealPlan', $mealPlan);
    }

    /** @test */
    public function front_create_displays_form()
    {
        Meal::factory()->count(3)->create();

        $response = $this->get(route('meal-plans.front.create'));

        $response->assertStatus(200);
        $response->assertViewIs('frontoffice.meal-plans.create');
        $response->assertViewHas('meals');
    }

    /** @test */
    public function front_store_creates_meal_plan()
    {
        $meal = Meal::factory()->create();

        $data = [
            'name' => 'Frontend Meal Plan',
            'description' => 'A meal plan created from frontend',
            'total_days' => 3,
            'assignments' => [
                [
                    'meal_id' => $meal->id,
                    'day_number' => 1,
                    'meal_time' => 'breakfast'
                ]
            ]
        ];

        $response = $this->post(route('meal-plans.front.store'), $data);

        $response->assertRedirect();
        $this->assertDatabaseHas('meal_plans', ['name' => 'Frontend Meal Plan']);
    }

    /** @test */
    public function front_edit_displays_form_for_owned_meal_plan()
    {
        $mealPlan = MealPlan::factory()->create(['created_by' => $this->user->id]);
        Meal::factory()->count(3)->create();

        $response = $this->get(route('meal-plans.front.edit', $mealPlan->id));

        $response->assertStatus(200);
        $response->assertViewIs('frontoffice.meal-plans.edit');
        $response->assertViewHas('mealPlan', $mealPlan);
        $response->assertViewHas('meals');
    }

    /** @test */
    public function front_update_updates_owned_meal_plan()
    {
        $mealPlan = MealPlan::factory()->create(['created_by' => $this->user->id]);
        $meal = Meal::factory()->create();

        $data = [
            'name' => 'Updated Frontend Meal Plan',
            'description' => 'Updated description',
            'total_days' => 5,
            'assignments' => [
                [
                    'meal_id' => $meal->id,
                    'day_number' => 1,
                    'meal_time' => 'lunch'
                ]
            ]
        ];

        $response = $this->put(route('meal-plans.front.update', $mealPlan->id), $data);

        $response->assertRedirect(route('meal-plans.front.show', $mealPlan->id));
        $this->assertDatabaseHas('meal_plans', ['name' => 'Updated Frontend Meal Plan']);
    }

    /** @test */
    public function front_destroy_deletes_owned_meal_plan()
    {
        $mealPlan = MealPlan::factory()->create(['created_by' => $this->user->id]);

        $response = $this->delete(route('meal-plans.front.destroy', $mealPlan->id));

        $response->assertRedirect(route('meal-plans.front.index'));
        $this->assertDatabaseMissing('meal_plans', ['id' => $mealPlan->id]);
    }

    /** @test */
    public function it_can_save_meal_plan()
    {
        $mealPlan = MealPlan::factory()->create();

        $response = $this->post(route('meal-plans.save', $mealPlan->id));

        $response->assertRedirect();
        $this->assertDatabaseHas('saved_meal_plans', [
            'user_id' => $this->user->id,
            'meal_plan_id' => $mealPlan->id
        ]);
    }

    /** @test */
    public function it_can_unsave_meal_plan()
    {
        $mealPlan = MealPlan::factory()->create();
        
        // First save the meal plan
        $mealPlan->savedBy()->attach($this->user->id);

        $response = $this->delete(route('meal-plans.unsave', $mealPlan->id));

        $response->assertRedirect();
        $this->assertDatabaseMissing('saved_meal_plans', [
            'user_id' => $this->user->id,
            'meal_plan_id' => $mealPlan->id
        ]);
    }
}
