<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // First, get all category IDs
        $categoryIds = DB::table('categories')->pluck('id');

        $products = [
            // Electronics Products
            [
                'category_id' => $categoryIds[0], // Electronics
                'name' => 'iPhone 15 Pro',
                'description' => 'Latest Apple smartphone with A17 Pro chip and titanium design',
                'price' => 999.99,
                'stock' => 50,
                'image' => 'https://images.unsplash.com/photo-1695048133142-1a20484d2569?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[0], // Electronics
                'name' => 'Samsung Galaxy S23',
                'description' => 'Android flagship phone with amazing camera',
                'price' => 799.99,
                'stock' => 75,
                'image' => 'https://images.unsplash.com/photo-1610945265064-0e34e5519bbf?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[0], // Electronics
                'name' => 'Sony WH-1000XM5',
                'description' => 'Premium noise-canceling headphones',
                'price' => 349.99,
                'stock' => 30,
                'image' => 'https://images.unsplash.com/photo-1505740420928-5e560c06d30e?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[0], // Electronics
                'name' => 'MacBook Pro 14"',
                'description' => 'Apple laptop with M3 Pro chip',
                'price' => 1999.99,
                'stock' => 25,
                'image' => 'https://images.unsplash.com/photo-1517336714731-489689fd1ca8?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Fashion Products
            [
                'category_id' => $categoryIds[1], // Fashion
                'name' => 'Leather Jacket',
                'description' => 'Premium genuine leather jacket',
                'price' => 129.99,
                'stock' => 40,
                'image' => 'https://images.unsplash.com/photo-1551028719-00167b16eac5?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[1], // Fashion
                'name' => 'Running Shoes',
                'description' => 'Comfortable running shoes for athletes',
                'price' => 89.99,
                'stock' => 60,
                'image' => 'https://images.unsplash.com/photo-1549298916-b41d501d3772?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Home & Garden
            [
                'category_id' => $categoryIds[2], // Home & Garden
                'name' => 'Modern Sofa',
                'description' => 'Comfortable 3-seater modern sofa',
                'price' => 499.99,
                'stock' => 15,
                'image' => 'https://images.unsplash.com/photo-1586023492125-27b2c045efd7?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[2], // Home & Garden
                'name' => 'Coffee Table',
                'description' => 'Wooden coffee table with storage',
                'price' => 129.99,
                'stock' => 35,
                'image' => 'https://images.unsplash.com/photo-1555041469-a586c61ea9bc?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Books
            [
                'category_id' => $categoryIds[3], // Books
                'name' => 'The Great Gatsby',
                'description' => 'Classic novel by F. Scott Fitzgerald',
                'price' => 12.99,
                'stock' => 100,
                'image' => 'https://images.unsplash.com/photo-1544716278-ca5e3f4abd8c?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[3], // Books
                'name' => 'Atomic Habits',
                'description' => 'Self-help book by James Clear',
                'price' => 16.99,
                'stock' => 80,
                'image' => 'https://images.unsplash.com/photo-1541963463532-d68292c34b19?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Sports
            [
                'category_id' => $categoryIds[4], // Sports
                'name' => 'Yoga Mat',
                'description' => 'Non-slip premium yoga mat',
                'price' => 29.99,
                'stock' => 45,
                'image' => 'https://images.unsplash.com/photo-1599901860904-17e6ed7083a0?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[4], // Sports
                'name' => 'Dumbbell Set',
                'description' => 'Adjustable dumbbell set 5-25kg',
                'price' => 149.99,
                'stock' => 20,
                'image' => 'https://images.unsplash.com/photo-1534367507877-0edd93bd013b?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Beauty
            [
                'category_id' => $categoryIds[5], // Beauty
                'name' => 'Face Cream',
                'description' => 'Anti-aging face cream with retinol',
                'price' => 34.99,
                'stock' => 65,
                'image' => 'https://images.unsplash.com/photo-1556228578-9c360e1d8d34?w-500&auto=format&fit=crop',
                'status' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[5], // Beauty
                'name' => 'Perfume Set',
                'description' => 'Luxury perfume collection',
                'price' => 79.99,
                'stock' => 25,
                'image' => 'https://images.unsplash.com/photo-1541643600914-78b084683601?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Toys
            [
                'category_id' => $categoryIds[6], // Toys
                'name' => 'LEGO Set',
                'description' => 'Star Wars LEGO building set',
                'price' => 49.99,
                'stock' => 55,
                'image' => 'https://images.unsplash.com/photo-1587654780298-8fdbdc533c4b?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[6], // Toys
                'name' => 'Remote Control Car',
                'description' => 'RC car with 50m range',
                'price' => 39.99,
                'stock' => 40,
                'image' => 'https://images.unsplash.com/photo-1550745165-9bc0b252726f?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],

            // Food & Beverages
            [
                'category_id' => $categoryIds[7], // Food & Beverages
                'name' => 'Organic Coffee',
                'description' => 'Premium organic coffee beans',
                'price' => 14.99,
                'stock' => 90,
                'image' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'category_id' => $categoryIds[7], // Food & Beverages
                'name' => 'Dark Chocolate',
                'description' => '85% cocoa dark chocolate bar',
                'price' => 5.99,
                'stock' => 120,
                'image' => 'https://images.unsplash.com/photo-1575377427642-087cf684f29d?w-500&auto=format&fit=crop',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ];

        DB::table('products')->insert($products);
    }
}
