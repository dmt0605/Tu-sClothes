<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class commentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Comment::insert([
            [
                'user_id' => 1,
                'product_id' => 1,
                'content' => 'Cái này oke nhé',
                'created_at' => now(),
            ],
            [
                'user_id' => 4,
                'product_id' => 1,
                'content' => 'Cái này oke lắm nè',
                'created_at' => now(),
            ],
        ]);
    }
}
