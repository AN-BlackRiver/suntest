<?php

namespace App\Http\Filter;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class PostFilter extends Filter
{
    protected array $keys = [
        'title',
        'category',
        'views_from',
        'views_to',
        'published_at_from',
        'published_at_to',
    ];



    protected function title(Builder $builder, $value)
    {
        $builder->where('title','ilike', "%$value%");
    }

    protected function category(Builder $builder, $value)
    {
        $builder->whereRelation('category','title', 'ilike', "%$value%");
    }

    protected function viewsFrom(Builder $builder, $value)
    {
        $builder->where('views','>=', $value);
    }
    protected function viewsTo(Builder $builder, $value)
    {
        $builder->where('views','<=', $value);
    }
    protected function publishedAtFrom(Builder $builder, $value)
    {
        $builder->where('published_at','>=', $value);
    }
    protected function publishedAtTo(Builder $builder, $value)
    {
        $builder->where('published_at','<=', $value);
    }
}
