<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Enums\Box\StatusBoxEnum;
use App\Enums\Box\TypeBoxEnum;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Box>
 */
final class BoxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::factory(),
            'name' => $this->faker->name(),
            'description' => $this->faker->text(),
            'capacity' => $this->faker->numberBetween(100, 1000),
            'quantity' => $this->faker->numberBetween(10, 100),
            'slug' => $this->faker->unique()->slug(),
            'type' => $this->faker->randomElement(TypeBoxEnum::cases()),
            'status' => $this->faker->randomElement(StatusBoxEnum::cases()),
            'deleted_at' => $this->faker->optional()->dateTime(),
        ];
    }
}
