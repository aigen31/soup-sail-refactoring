<?php

namespace Database\Factories\Control;

use App\Models\Control\Project;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
  /**
   * The name of the factory's corresponding model.
   *
   * @var class-string<TModel>
   */
  protected $model = Project::class;
  
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */
  public function definition(): array
  {
    return [
      'name' => $this->faker->sentence(2),
      'description' => $this->faker->text(50),
      'user_id' => $this->faker->numberBetween(4, 5),
    ];
  }
}
