<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
   public function run(): void
{
    Category::create(['name' => 'Điện thoại']);
    Category::create(['name' => 'Laptop']);
    Category::create(['name' => 'iPad']);
    Category::create(['name' => 'Phụ kiện']);
}
}
