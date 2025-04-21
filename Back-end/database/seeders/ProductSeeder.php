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
        $products = [
            ['name' => 'Organic Apple', 'category' => 'Fruits', 'price' => 5.99, 'image' => 'imgs/product1.png', 'description' => 'Fresh organic apples.'],
            ['name' => 'Fresh Carrots', 'category' => 'Vegetables', 'price' => 3.49, 'image' => 'imgs/product2.jpg', 'description' => 'Crisp fresh carrots.'],
            ['name' => 'Whole Wheat Bread', 'category' => 'Bread', 'price' => 2.99, 'image' => 'imgs/product3.jpg', 'description' => 'Healthy whole wheat bread.'],
            ['name' => 'Organic Milk', 'category' => 'Drinks', 'price' => 4.49, 'image' => 'imgs/product4.jpg', 'description' => 'Pure organic milk.'],
            ['name' => 'Fresh Bananas', 'category' => 'Fruits', 'price' => 1.99, 'image' => 'imgs/product5.jpg', 'description' => 'Ripe fresh bananas.'],
            ['name' => 'Organic Eggs', 'category' => 'Others', 'price' => 3.99, 'image' => 'imgs/product6.jpg', 'description' => 'Free-range organic eggs.'],
            ['name' => 'Fresh Tomatoes', 'category' => 'Vegetables', 'price' => 2.49, 'image' => 'imgs/product7.jpg', 'description' => 'Juicy fresh tomatoes.'],
            ['name' => 'Organic Chicken', 'category' => 'Meat', 'price' => 7.99, 'image' => 'imgs/product8.jpg', 'description' => 'Organic free-range chicken.'],
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
