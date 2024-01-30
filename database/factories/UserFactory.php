<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'remember_token' => Str::random(10),
            'is_delete' => $this->faker->boolean,
            'user_type' => $this->faker->randomElement([1, 2, 3, 4]),
            'admission_number' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
            'roll_number' => $this->faker->randomNumber($nbDigits = 5, $strict = false),
            'class_id' => $this->faker->randomNumber(),
            'gender' => $this->faker->randomElement(['Male', 'Female']),
            'occupation' => $this->faker->word,
            'date_of_birth' => $this->faker->date,
            'caste' => $this->faker->word,
            'religion' => $this->faker->word,
            'mobile_number' => $this->faker->phoneNumber,
            'admission_date' => $this->faker->date,
            'profile_pic' => $this->faker->url(),
            'blood_group' => $this->faker->word,
            'height' => $this->faker->word,
            'weight' => $this->faker->word,
        ];



    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
