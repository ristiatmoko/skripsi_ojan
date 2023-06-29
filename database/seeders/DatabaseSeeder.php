<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         User::factory(3)->create();
         Product::factory(100)->create();
         Category::factory(5)->create();

         $products = Product::with('category')->get();
         foreach ($products as $product) {
             $pattern = substr($product->category->category_name, 0,1) . '-' . sprintf("%06s", $product->id);
             $product->update(['unique_id' => $pattern]);
         }

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
