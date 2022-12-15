<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //To avoid duplicate slug entry exception used try catch block
        try{
            \App\Models\Post::factory(20)->create();
        }catch(\Throwable $e){}

    }
}
