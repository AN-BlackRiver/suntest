<?php

namespace App\Models\Traits;

use App\Models\Log;
use Illuminate\Database\Eloquent\Model;

trait HasLogs
{
    private const CREATED = "created";
    private const UPDATED = "updated";
    private const DELETED = "deleted";

    protected static function bootHasLogs()
    {

        static::created(function (Model $model) {
            Log::query()->create([
                'model' => static::class,
                'event' => self::CREATED,
                'old_field' => $model->getOriginal(),
                'new_field' => $model->getAttributes(),
            ]);
        });

        static::updated(function (Model $model) {
            Log::query()->create([
                'model' => static::class,
                'event' => self::UPDATED,
                'old_field' => $model->getOriginal(),
                'new_field' => $model->getAttributes(),
            ]);
        });

        static::deleted(function (Model $model) {
            Log::query()->create([
                'model' => static::class,
                'event' => self::DELETED,
                'old_field' => $model->getOriginal(),
                'new_field' => null,
            ]);
        });
    }
}
