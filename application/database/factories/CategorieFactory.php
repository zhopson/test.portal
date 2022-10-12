<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Categorie;

class CategorieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    
    protected $model = Categorie::class;
    
    
    public function definition()
    {
        return [
    //        'parent_id' => function() {
    //            return Categorie::factory()->create()->id;
    //        },
            'parent_id' => $this->faker->randomDigit+1,
            'name' => substr($this->faker->sentence(2), 0, -1),
        ];
    }
}
