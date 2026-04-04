<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        $products = [

            // 📱 ĐIỆN THOẠI (category_id = 1)
            ['iPhone 15 Pro Max', 32990000, 10, 1],
            ['iPhone 14 Pro', 25990000, 8, 1],
            ['Samsung Galaxy S24 Ultra', 28990000, 12, 1],
            ['Samsung Galaxy A54', 9990000, 15, 1],
            ['Xiaomi 13 Pro', 21990000, 10, 1],
            ['Oppo Find X5 Pro', 19990000, 7, 1],
            ['Vivo V27', 10990000, 20, 1],
            ['Realme GT Neo 5', 8990000, 14, 1],
            ['iPhone 13', 18990000, 9, 1],
            ['Samsung Galaxy Z Fold5', 40990000, 5, 1],

            // 💻 LAPTOP (category_id = 2)
            ['MacBook Air M1', 18990000, 10, 2],
            ['MacBook Air M2', 26990000, 7, 2],
            ['MacBook Pro M3', 45990000, 5, 2],
            ['Dell XPS 13', 29990000, 6, 2],
            ['HP Spectre x360', 27990000, 8, 2],
            ['Asus ROG Strix G15', 25990000, 10, 2],
            ['Lenovo Legion 5', 23990000, 12, 2],
            ['Acer Nitro 5', 18990000, 15, 2],
            ['MSI Katana GF66', 20990000, 11, 2],
            ['Asus Vivobook 15', 12990000, 18, 2],

            // 📱 IPAD (category_id = 3)
            ['iPad Gen 10', 10990000, 20, 3],
            ['iPad Gen 9', 8990000, 15, 3],
            ['iPad Air 5', 15990000, 10, 3],
            ['iPad Pro M2 11 inch', 21990000, 8, 3],
            ['iPad Pro M2 12.9 inch', 29990000, 5, 3],
            ['iPad Mini 6', 13990000, 9, 3],
            ['iPad Air 4', 12990000, 6, 3],
            ['iPad Pro 2021', 19990000, 7, 3],
            ['iPad Gen 8', 7990000, 10, 3],
            ['iPad Mini 5', 9990000, 8, 3],

            // 🎧 PHỤ KIỆN (category_id = 4)
            ['AirPods Pro 2', 5990000, 25, 4],
            ['AirPods 3', 3990000, 20, 4],
            ['Samsung Galaxy Buds 2 Pro', 3490000, 18, 4],
            ['Tai nghe Sony WH-1000XM5', 8990000, 10, 4],
            ['Chuột Logitech MX Master 3', 2490000, 15, 4],
            ['Bàn phím Keychron K2', 1990000, 12, 4],
            ['Sạc nhanh Anker 65W', 990000, 30, 4],
            ['Cáp sạc Type-C Baseus', 150000, 50, 4],
            ['Loa JBL Charge 5', 3990000, 14, 4],
            ['Giá đỡ laptop', 300000, 25, 4],

            // ➕ thêm để đủ 50
            ['Xiaomi Redmi Note 13', 5990000, 20, 1],
            ['Oppo Reno10', 8990000, 15, 1],
            ['HP Pavilion 15', 15990000, 10, 2],
            ['Dell Inspiron 15', 14990000, 12, 2],
            ['iPad Pro M1', 18990000, 6, 3],
            ['Apple Pencil 2', 3490000, 20, 4],
            ['Magic Keyboard iPad', 7990000, 5, 4],
            ['Chuột không dây Logitech M331', 350000, 30, 4],
            ['Tai nghe Gaming Razer Kraken', 1290000, 15, 4],
            ['USB Kingston 64GB', 200000, 40, 4],
        ];

        $data = [];

        foreach ($products as $index => $item) {
            $data[] = [
                'name' => $item[0],
                'price' => $item[1],
                'quantity' => $item[2],
                'category_id' => $item[3],
                'image' => null,
                'created_at' => Carbon::now()->subDays(rand(0, 30)),
                'updated_at' => now(),
            ];
        }

        Product::insert($data);
    }
}