<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $images = [
            'https://www.healthynibblesandbits.com/wp-content/uploads/kimchi-fried-rice.jpg',
            'https://assets.tmecosys.com/image/upload/t_web_rdp_recipe_584x480/img/recipe/ras/Assets/cf0a79d8475af440f62ee30071c10d60/Derivates/b3adf8f5f1d52e40e4a47ab3684030edc17528d9.jpg',
            'https://sumeks.disway.id/upload/c2eada2215d34da4437c067d7d1de05e.jpeg',
            // bisa tambahkan URL lain di sini
        ];

        return [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => $this->faker->numberBetween(1000, 100000),
            'category_id' => \App\Models\Category::inRandomOrder()->first()->id ?? 1,
            'img' => $this->faker->randomElement($images),
            'is_active' => $this->faker->boolean(80),
        ];
    }
}
