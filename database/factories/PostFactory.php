<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            /* definimos los campos y tipos de campos a fabricar con los seeder */
            'title' =>$this->faker->sentence(), /* titulo del post */
            'content'=> $this->faker->text(), /* contenido del post */
            'image'=> 'posts/'. $this->faker->image('public/storage/posts', 640, 480, null, false) /* imagen del post */

        ];
    }
}
