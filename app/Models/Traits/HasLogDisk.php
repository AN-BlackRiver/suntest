<?php

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;
use Monolog\Formatter\LineFormatter;
use Monolog\Handler\StreamHandler;

trait HasLogDisk
{

    protected static function bootHasLogDisk()
    {
        static::created(function (Model $model) {
            static::logAction($model, 'created', "Создана запись: " . json_encode($model->getAttributes(), JSON_UNESCAPED_UNICODE));
        });

        static::updated(function (Model $model) {
            static::logAction($model, 'updated', 'Обновлена запись: ' . json_encode($model->getAttributes(), JSON_UNESCAPED_UNICODE));
        });

        static::deleted(function (Model $model) {
            static::logAction($model, 'deleted', 'Удалена запись: ' . json_encode($model->getAttributes(), JSON_UNESCAPED_UNICODE));
        });
    }

    protected static function logAction(Model $model, string $event, string $message)
    {
        $formatter = new LineFormatter("[%datetime%] %message%\n", "Y-m-d H:i:s", false, true);

        $logDirectory = storage_path("logs/{$model->getTable()}");
        if (!file_exists($logDirectory)) {
            mkdir($logDirectory, 0777, true);
        }

        $log = Log::build([
            'driver' => 'monolog',
            'handler' => StreamHandler::class,
            'with' => [
                'stream' => "$logDirectory/{$event}.log",
            ],
            'tap' => [function ($logger) use ($formatter) {
                foreach ($logger->getHandlers() as $handler) {
                    $handler->setFormatter($formatter);
                }
            }],
        ]);

        $log->info($message);
    }
}
