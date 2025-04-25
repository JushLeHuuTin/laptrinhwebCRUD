<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProductSeeder extends Seeder
{
    const MAX_RECORDS = 50;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate table
        DB::table('products')->truncate();

        // Danh sách tên sản phẩm mẫu
        $productNames = [
            'iPhone 14', 'Samsung Galaxy S23', 'Xiaomi 13', 'Oppo Find X5', 'Vivo V27',
            'MacBook Pro 14', 'Dell XPS 13', 'HP Spectre x360', 'Lenovo ThinkPad X1', 'Asus ROG Zephyrus',
            'Sony WH-1000XM5', 'AirPods Pro 2', 'JBL Flip 6', 'Bose QuietComfort 45', 'Anker Soundcore',
            'Apple Watch Series 8', 'Samsung Galaxy Watch 5', 'Garmin Forerunner 955', 'Fitbit Versa 4', 'Huawei Watch GT 3',
        ];

        // Tạo 50 sản phẩm
        for ($i = 0; $i < self::MAX_RECORDS; $i++) {
            $name = $productNames[$i % count($productNames)] . ' ' . ($i + 1); // Lặp lại tên sản phẩm và thêm số
            DB::table('products')->insert([
                'name' => $name,
                'image' => 'images/' . Str::slug($name) . '.jpg', // Đường dẫn ảnh giả lập
                'price' => rand(200, 2000) * 1000, // Giá từ 200,000 đến 2,000,000
                'quantity' => rand(10, 100), // Số lượng từ 10 đến 100
                'description' => 'Mô tả sản phẩm ' . $name . '. Đây là sản phẩm chất lượng cao.',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}