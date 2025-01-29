<?php

namespace App\Console\Commands;

use App\Models\Post;
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
        /*$post = Post::query()->create([
           'title' => 'test',
           'content' => 'test',
        ]);*/

        $post = Post::query()->find(3);

        /*$post->update([
            'title' => 'Updated title',
        ]);*/

        $post->delete();

        dd(200, "OK");
    }
}
