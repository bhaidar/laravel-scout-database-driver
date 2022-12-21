<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsCategoriesTableSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run()
    {
        // Generate 5 categories
        $data = [
            ['name' => 'News'],
            ['name' => 'Sports'],
            ['name' => 'Entertainment'],
            ['name' => 'Technology'],
            ['name' => 'Business'],
        ];

        DB::table('categories')->insert($data);

        // Generate 1000 posts
        for ($i = 1; $i <= 1000; $i++) {
            DB::table('posts')->insert([
                'title' => "Post $i",
                'body' => "Content for post $i",
                'category_id' => rand(1, 5)
            ]);
        }
    }
}
