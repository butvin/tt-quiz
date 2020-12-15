<?php

namespace Database\Factories;

use App\Models\Poll;
use App\Models\PollOption;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class PollOptionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = PollOption::class;

    /**
     * Define the model's default state.
     *
     * @return array
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'parent_id' => null,
            'poll_id' => random_int(1, 15),
            'name' => $this->faker->text(16),
            'status' => $this->faker->boolean,
            'created_at' => $this->faker->dateTime,
            'updated_at' => $this->faker->dateTime,
        ];
    }
}
