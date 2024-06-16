<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Score>
 */
class ScoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private static $userId = 1;

    public function definition(): array
    {
        return [
            'user_id' => self::$userId++,
            'math' => mt_rand(50, 100),
            'kimia' => mt_rand(50, 100),
            'fisika' => mt_rand(50, 100),
            'biologi' => mt_rand(50, 100)
        ];
    }
}
