<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class Profile extends Model
{
    public function user(): belongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function posts(): HasMany
    {
        return $this->hasMany(Post::class);
    }
    public function likedPosts() : MorphToMany
    {
        return $this->morphedByMany(Post::class, 'likable');
    }

    public function likedComments() : MorphToMany
    {
        return $this->morphedByMany(Comment::class, 'likable');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }
}
