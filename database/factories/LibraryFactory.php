<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Http;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Library>
 */
class LibraryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $response = Http::get('https://api.unsplash.com/photos/random', [
            'client_id' => 'v4rOKvuWvwSSrUKbMgTAMPyCNl0Eu2ybV8toa3q_Em0',
            'query' => 'book cover',
            'orientation' => 'landscape', 
        ]);
        
        $image = $response->json()['urls']['regular'];

        return [
            'title' => $this->faker->sentence(3),
            'author' => $this->faker->name(),
            'publisher' => $this->faker->company(),
            'description' => $this->faker->paragraph(5),
            'category' => $this->faker->word(),
            'isbn' => $this->faker->isbn13(),
            'image' => $image,
        ];
    }
}