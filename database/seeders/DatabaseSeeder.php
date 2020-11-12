<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Category;
use App\Models\News;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::factory()->create(["is_admin" => true]);
        $users = User::factory(3)->create();

        $categories = Category::factory(5)->create()->each(function ($category){
            $news = News::factory(5)->create();
            $category->news()->sync($news);
        });
    }
}
