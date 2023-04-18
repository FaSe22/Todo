<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Date;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Todo>
 */
class TodoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->sentence(5),
            'description' => fake()->sentence(15),
        ];
    }

    public function status(string $status)
    {
        return $this->state(function ($status) {
            return [
                'status' => $status
            ];
        });
    }

    public function priority(string $priority)
    {
        return $this->state(function ($priority) {
            return [
                'priority' => $priority
            ];
        });
    }

    public function due_date(Date $due_date)
    {
        return $this->state(function ($due_date) {
            return [
                'due_date' => $due_date
            ];
        });
    }
}
