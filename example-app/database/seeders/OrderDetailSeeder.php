<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Truncate table
        DB::table('order_detail')->truncate();

        // Lấy danh sách order và product
        $orders = DB::table('orders')->pluck('id')->toArray();
        $products = DB::table('products')->select('id', 'price')->get()->toArray();

        // Tạo chi tiết đơn hàng
        foreach ($orders as $orderId) {
            $numItems = rand(1, 5); // Mỗi đơn hàng có 1-5 sản phẩm
            $totalAmount = 0;

            for ($i = 0; $i < $numItems; $i++) {
                $product = $products[array_rand($products)]; // Chọn ngẫu nhiên sản phẩm
                $quantity = rand(1, 5); // Số lượng từ 1-5
                $subTotal = $product->price * $quantity; // Tính tổng phụ
                $totalAmount += $subTotal; // Cộng vào tổng đơn hàng

                DB::table('order_detail')->insert([
                    'order_id' => $orderId,
                    'product_id' => $product->id,
                    'quantity' => $quantity,
                    'notes' => 'Ghi chú cho sản phẩm ' . $product->id . ' trong đơn hàng ' . $orderId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            // Cập nhật total_amount cho đơn hàng
            DB::table('orders')->where('id', $orderId)->update(['total_amount' => $totalAmount]);
        }
    }
}