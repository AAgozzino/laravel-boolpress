<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Article;
use App\User;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        for ($i=0; $i < 20 ; $i++) { 
            
            $user = User::inRandomOrder()->first();

            $newArticle = new Article;

            $newArticle->user_id = $user->id;
            $newArticle->title = $faker->sentence(5, true);
            $newArticle->content = $faker->paragraph(10, true);
            $newArticle->excerpt = $faker->sentence(2);
            $newArticle->slug = Str::of($newArticle->title)->slug('-');

            $newArticle->save();
        }
    }
}
