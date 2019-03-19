<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = factory(App\Post::class, 10)->create()->each(function ($post) {
        });

        foreach($posts as $row)
        {
            $row->Category()->sync(3);

        }

        $posts = factory(App\Post::class, 10)->create()->each(function ($post) {
        });

        foreach($posts as $row)
        {
            $row->Category()->sync(10);

        }

        $posts = factory(App\Post::class, 10)->create()->each(function ($post) {
        });

        foreach($posts as $row)
        {
            $row->Category()->sync(16);

        }

        $posts = factory(App\Post::class, 10)->create()->each(function ($post) {
        });

        foreach($posts as $row)
        {
            $row->Category()->sync(15);

        }

    }
}
