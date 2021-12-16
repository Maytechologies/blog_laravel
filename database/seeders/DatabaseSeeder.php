<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage; /* le indicamos la manipulacion de la carpeta storage */

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()

    {   Storage::deleteDirectory('posts'); /* SI existe un directorio post eliminalo! */

        Storage::makeDirectory('posts'); /* si NO existe un directorio post Crearlo */

        /* Estas dos sentencias Storage se ejecutan para evitar que la carpeta post se llene de imagenes cada vez 
        que ejecutemos los seeder  */

        \App\Models\Post::factory(100)->create();
    }
}
