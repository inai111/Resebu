<?php

namespace Database\Factories;

use App\Models\Resep;
use Illuminate\Database\Eloquent\Factories\Factory;

class ResepFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Resep::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id_user'=>$this->faker->numberBetween(1,6),
            'id_kategori'=>$this->faker->numberBetween(1,2),
            'nama'=>$this->faker->sentence(3,false),
            'body'=>$this->faker->paragraphs(6,true),
            'video'=> 'default.mp4',
            'gambar'=> 'default.png',
        ];
    }
}
