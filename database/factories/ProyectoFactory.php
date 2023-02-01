<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
          
           // 'description' => fake()->description(),  
           // 'github_link' => fake()->github_link(),
           // 'link' => fake()->link(),
           // 'image' => fake()->image(),
            //'technologies' => fake()->technologies(), 
        ];
    }
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    } 
}
