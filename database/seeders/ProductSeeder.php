<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::query()->create([
            'name' => 'Яблоко',
            'price' => 50
        ]);
        Product::query()->create([
            'name' => 'Молоко',
            'price' => 100
        ]);
    }
}
