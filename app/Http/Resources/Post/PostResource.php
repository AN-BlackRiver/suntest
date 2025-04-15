<?php

namespace App\Http\Resources\Post;

use App\Http\Resources\Category\CategoryResource;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PostResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'content' => $this->content,
            'category' => CategoryResource::make($this->category)->resolve(),
            'likes' => $this->likes,
            'views' => $this->views,
            'published_at' => $this->published_at,
            'image_url' => $this->image_url,
            'tags' => $this->tags
        ];
    }
}
