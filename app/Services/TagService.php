<?php

namespace App\Services;

use App\Models\Tag;

class TagService
{
    public static function store(array $data): Tag
    {

        return Tag::query()->create($data);

    }

    public static function storeBatch(string $tags)
    {
        $data = explode(',', $tags);
        $tagIds = [];

        foreach ($data as $tagTitle) {
            $tagIds[] = Tag::query()->firstOrCreate(['title' => mb_trim($tagTitle)])->id;
        }

        return $tagIds;
    }
    public static function update(Tag $tag, array $data): Tag
    {
        $tag->update($data);

        return $tag;
    }
}
