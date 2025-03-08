<?php

namespace App\Console\Commands;

use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
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

    public function handle()
    {

        $tag = Tag::find(34);
        $tag->delete();
        echo 200 . "OK";



        /** ПРОВЕРКА ОТНОШЕНИЙ **/

//        $user1 = User::find(1);
//        $user2 = User::find(2);
//        dd($user1->profile->toArray(), $user2->profile->toArray());

//        $profile1 = Profile::find(1);
//        $profile2 = Profile::find(2);
//        dd($profile1->user->toArray());
//        dd($profile1->posts->toArray(), $profile2->posts->toArray());
//        dd($profile1->comments->toArray(), $profile2->comments->toArray());
//        dd($profile2->likedPosts->toArray());

//        $post1 = Post::find(1);
//        $post2 = Post::find(2);
//        dd($post1->profile->toArray(), $post2->profile->toArray());
//        dd($post2->likes->toArray());
//        dd($post2->tags->toArray());
//        dd($post1->category->toArray());
//        dd($post2->comments->toArray());

//        $tag = Tag::first();
//        dd($tag->posts->toArray());

//        $category = Category::find(2);
//        dd($category->posts->toArray());

        //$comment = Comment::find(1);
        //  dd($comment->profile->toArray());
//        dd($comment->parentComment?->toArray());
//        dd($comment->childComments?->toArray());
//        dd($comment->post->toArray());


        /** ОТНОШЕНИЯ ЧЕРЕЗ **/

        // $categories = Category::find(2);
        //dd($categories->comment->toArray());
        //dd($categories->commen->toArray());

//        $comment = Comment::find(1);
//        dd($comment->category->toArray());

        //$user = User::find(1);
        //  dd($user->comments->toArray());
        // dd($user->comment->toArray());

//        $comment = Comment::find(1);
//        dd($comment->user->toArray());

        /** ПРОВЕРКА МЕТОДОВ ДЛЯ МНОГИХ КО МНОГИМ
         *
         * attach
         * detach
         * sync
         * syncWithoutDetaching
         * toggle
         * updateExistingPivot*
         *
         */

        //$post = Post::find(1);
        //$post->likes()->attach([1,2]);
        // $post->likes()->detach([1,2]);
        //$post->likes()->sync(2);
        //$post->likes()->syncWithoutDetaching(1);
        //$post->likes()->toggle(2);
        /*  $post->likes()->updateExistingPivot(2, [
              'updated_at' => now(),
          ]);*/
        /** ПРОВЕРКА ПОЛИМОРФНЫХ ОТНОШЕНИЙ **/

        /** Один к одному ***/
         $posts = Post::find(2);
         /*$posts->image()->create([
            'path' => 'lol.jpg'
         ]);*/

//        dd($posts->image->toArray());
//          $image = Image::first();
//          dd($image->imageable->toArray());

        /** Один ко многим ***/
//        $posts = Post::find(2);
        /*$posts->comments()->create([
           'content' => '12345blbls',
            'profile_id' => $posts->profile_id,
        ]);*/
//        $comment = Comment::find(2);
//        dd($comment->commentable->toArray());

//        $comment = Comment::find(2);
        /*$comment->comments()->create([
            'content' => 'test',
            'profile_id' => Profile::find(1)->id,
            'parent_id' => $comment->id
        ]);*/

        /** Многие ко многим ***/
//          $posts = Post::find(2);
//        $posts->likedByPosts()->toggle(1);
//         $comments = Comment::first();
//         $comments->likedByComment()->toggle(1);
//          $profile = Profile::first();
        //  dd($profile->likedComments->toArray());
        //   dd($profile->likedPosts->toArray());

    }
}
