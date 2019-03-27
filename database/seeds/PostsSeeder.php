<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Post;
use App\Category;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $author1 = User::where('email', 'pv1@allaravel.dev')->first();
        $author2 = User::where('email', 'pv2@allaravel.dev')->first();
       
        $technology = Category::where('slug', 'technology')->first();
        $car = Category::where('slug', 'car')->first();
        $sport = Category::where('slug', 'sport')->first();

        $faker = Faker\Factory::create();
        for ($i = 0; $i < 10; $i++) {
            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $post = Post::create([
                'title' => $title,
                'body' => $faker->text($maxNbChars = 1000),
                'slug' => str_slug($title),
                'description' => $faker->text($maxNbChars = 200),
                'thumbnail' => $faker->imageUrl(690,300),
                'published' => rand(0, 1),
                'user_id' => $author1->id,
            ]);
            $post->categories()->attach($technology);

            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $post = Post::create([
                'title' => $title,
                'body' => $faker->text($maxNbChars = 1000),
                'slug' => str_slug($title),
                'description' => $faker->text($maxNbChars = 200),
                'thumbnail' => $faker->imageUrl(690,300),
                'published' => rand(0, 1),
                'user_id' => $author2->id,
            ]);
            $post->categories()->attach($car);

            $title = $faker->sentence($nbWords = 6, $variableNbWords = true);
            $post = Post::create([
                'title' => $title,
                'body' => $faker->text($maxNbChars = 1000),
                'slug' => str_slug($title),
                'description' => $faker->text($maxNbChars = 200),
                'thumbnail' => $faker->imageUrl(690,300),
                'published' => rand(0, 1),
                'user_id' => rand($author1->id,$author2->id),
            ]);
            $post->categories()->attach($sport);
        }
    }
}