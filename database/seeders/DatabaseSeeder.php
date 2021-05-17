<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');

        User::truncate();
        Category::truncate();
        Product::truncate();
        Transaction::truncate();
        DB::table('category_product')->truncate();

        $usersQty = 200;
        $categoriesQty = 30;
        $productsQty = 1000;
        $transactionsQty = 1000;

        User::factory()->count($usersQty)->create();
        Category::factory()->count($categoriesQty)->create();
        Product::factory()->count($productsQty)->create()->each(
            function ($product) {
                $categories = Category::all()->random(mt_rand(1, 4))->pluck('id');
                $product->categories()->attach($categories);
            }
        );
        Transaction::factory()->count($transactionsQty)->create();
    }
}
