<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public static function store(array $data): Tag
    {

        return Tag::query()->create($data);

    }
    public static function update(Tag $tag, array $data): Tag
    {
        $tag->update($data);

        return $tag;
    }
}
