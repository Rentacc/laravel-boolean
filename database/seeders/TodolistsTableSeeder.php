<?php

namespace Database\Seeders;

use App\Models\Todolist;
use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TodolistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i <= 20; $i++) {
            $var = $faker->boolean();
            $image = null;

            if($var==0) { 
                $image ='https://picsum.photos/200/300';
            };

            $var = $faker->boolean();
            $desc = null;
            if($var==0) { 
                $desc = $faker->sentence('10');
            };
            Todolist::create([
                'done' => $faker->boolean(),
                'expire_date' => $faker->date(),
                'title' => $faker->sentence('2'),
                'image' => $image,
                'details' => $desc,
            ]);


        }
        ;

    }
}