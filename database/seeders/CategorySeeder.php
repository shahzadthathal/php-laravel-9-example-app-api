<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //To avoid duplicate entry exception used try catch block
        try{
            \App\Models\Category::factory(5)->create();
        }catch(\Throwable $e){}
    }
}
