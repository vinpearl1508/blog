<?php

use Illuminate\Database\Seeder;
use App\Tag;

class TagsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $tokyo = Tag::create([
            'name' => 'tokyo', 
            'slug' => 'tokyo',
        ]);
        $newyork = Tag::create([
            'name' => 'newyork', 
            'slug' => 'newyork',
        ]);
        $beijing = Tag::create([
            'name' => 'beijing', 
            'slug' => 'beijing',
        ]);
        $saigon = Tag::create([
            'name' => 'saigon', 
            'slug' => 'saigon',
        ]);
        $danang = Tag::create([
            'name' => 'danang', 
            'slug' => 'danang',
        ]);
        $taipei = Tag::create([
            'name' => 'taipei', 
            'slug' => 'taipei',
        ]);
        $okinawa = Tag::create([
            'name' => 'okinawa', 
            'slug' => 'okinawa',
        ]);
        $honolulu = Tag::create([
            'name' => 'honolulu', 
            'slug' => 'honolulu',
        ]);
    }
}