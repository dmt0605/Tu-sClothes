<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class categorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            "tenLoai" => "Áo",
            "thuTu" => 1,
        ]);
        Category::create([
            "tenLoai" => "Quần",
            "thuTu" => 2,
        ]);
        Category::create([
            "tenLoai" => "Balo",
            "thuTu" => 3,
        ]);
        Category::create([
            "tenLoai" => "Nón",
            "thuTu" => 4,
        ]);
    }
}
