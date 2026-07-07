<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Article;
use App\Models\Category;

use function PHPUnit\Framework\isEmpty;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::all();

        if($categories->isEmpty()){
            $categories = Category::factory(5)->create();
        }
        Article::factory(10)->create()->each(function ($article) use ($categories) {
            $article->categories()->attach($categories->random(rand(1, 3))->pluck('id'));
        });
    }
    

}

