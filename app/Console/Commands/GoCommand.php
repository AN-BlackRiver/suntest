<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Post;
use App\Models\Profile;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Console\Command;

class GoCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'go';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Go php debug';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $post = Post::first();

        $post->like(1);

        dd("success");
          /*dd($post->category->toArray());
        dd($post->tags->toArray());*/


        /*$category = Category::first();
          dd($category->posts);*/

        /*$tag = Tag::first();
        dd($tag->posts->toArray());*/

        /*$user = User::first();
        dd($user->profile->toArray());*/

        /* $profile = Profile::first();
        dd($profile->user->toArray());*/
    }
}
