<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for($i = 0; $i < 10; $i++){
          $new_post = new Post();

          $new_post->title=$faker->sentence(rand(2, 5));
          $new_post->content=$faker->text(rand(100, 200));

          $slug = str::slug($new_post->title, "-");
          $new_post->slug = $slug;
          $new_post ->save();
        }
    }
}
