<?php

namespace App\Models;

use App\Http\Filter\PostFilter;
use App\Models\Traits\HasFilter;
use App\Models\Traits\HasLogDisk;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\DB;
use Storage;

class Post extends Model
{
    use HasFactory;
    use HasLogDisk;
    use HasFilter;
    public function profile(): BelongsTo
    {
        return $this->belongsTo(Profile::class);
    }
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
    }

    public function likedByPosts() : MorphToMany
    {
        return $this->MorphToMany(Profile::class, 'likable');
    }

    public function comments(): MorphMany
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function image(): MorphOne
    {
        return $this->morphOne(Image::class, 'imageable');
    }

    public function getImageUrlAttribute(): string
    {
        return Storage::disk('public')->url($this->image?->path);
    }
}
