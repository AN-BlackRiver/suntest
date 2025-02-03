<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\DB;

class Post extends Model
{

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function like(int $profileId)
    {
        DB::table('post_profile_likes')->insert([
            'profile_id' => $profileId,
            'post_id' => $this->id,
        ]);
    }

    public function likes() : BelongsToMany
    {
        return $this->belongsToMany(
            Profile::class,
            'post_profile_likes',
            'post_id',
            'profile_id'
        );
    }
}
