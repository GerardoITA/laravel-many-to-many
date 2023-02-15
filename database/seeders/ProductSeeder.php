<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Typology;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Product::factory()->count(25)->make()->each(function ($p) {

            // FK
            $typology = Typology::inRandomOrder()->first();
            $p->typology()->associate($typology);

            $p->save();

            // NaM
            $categories = Category::inRandomOrder()->limit(rand(1, 3))->get();
            $p->categories()->attach($categories);
        });
    }
}
