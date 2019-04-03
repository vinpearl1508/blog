<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $technology = Category::create([
            'name' => 'Công nghệ', 
            'slug' => 'technology',
        ]);
        $car = Category::create([
            'name' => 'Xe hơi', 
            'slug' => 'car',
        ]);
        $sport = Category::create([
            'name' => 'Thể thao', 
            'slug' => 'sport',
        ]);
        $traveling = Category::create([
            'name' => 'Du lịch', 
            'slug' => 'traveling',
        ]);
        $gym = Category::create([
            'name' => 'Thể hình', 
            'slug' => 'gym',
        ]);
    }
}