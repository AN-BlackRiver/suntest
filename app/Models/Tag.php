<?php

namespace App\Models;

use App\Models\Traits\HasLogs;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;
    use HasLogs;

    public function posts(): BelongsToMany
    {
        return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    }

    protected static function booted()
    {
        self::deleting(function (Tag $tag) {
            Log::query()->create([
                'model' => static::class,
                'event' => 'deletefromBootModel',
                'old_field' => $tag->getOriginal(),
                'new_field' => null,
            ]);
        });
    }

}
