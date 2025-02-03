<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Profile extends Model
{
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function likedPosts() : BelongsToMany
    {
        return $this->belongsToMany(
            Post::class,
            'post_profile_likes',
            'profile_id',
            'post_id'
        );
    }
}
