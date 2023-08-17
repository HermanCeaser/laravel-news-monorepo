<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = config('constants.categories');

        foreach ($categories as $category) {
            DB::table('categories')->insert(['name' => $category]);
        }
    }
}
