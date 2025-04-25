<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    const MAX_RECORDS = 200;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate table
        DB::table('orders')->truncate();

        // Tạo 200 đơn hàng
        for ($i = 0; $i < self::MAX_RECORDS; $i++) {
            DB::table('orders')->insert([
                'user_id' => rand(1, 100), // Chọn ngẫu nhiên user_id từ 1 đến 100
                'total_amount' => 0, // Sẽ cập nhật sau khi tạo chi tiết đơn hàng
                'created_at' => now()->subDays(rand(1, 30)), // Đơn hàng từ 1-30 ngày trước
                'updated_at' => now(),
            ]);
        }
    }
}