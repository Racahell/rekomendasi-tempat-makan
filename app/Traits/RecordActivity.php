<?php

namespace App\Traits;

use App\Models\AuditLog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;

trait RecordActivity
{
    protected static function bootRecordActivity()
    {
        foreach (static::getRecordEvents() as $event) {
            static::$event(function (Model $model) use ($event) {
                $model->recordActivity($event);
            });
        }
    }

    protected static function getRecordEvents()
    {
        return ['created', 'updated', 'deleted', 'restored'];
    }

    public function recordActivity($event)
    {
        $properties = null;

        if ($event === 'updated') {
            $properties = [
                'old' => $this->getOriginal(),
                'new' => $this->getAttributes(),
            ];
        }

        AuditLog::create([
            'user_id' => Auth::id(),
            'action' => $event,
            'model' => class_basename($this),
            'model_id' => $this->id,
            'payload' => $properties ? json_encode($properties) : null,
            'ip_address' => request()->ip(),
            'user_agent' => request()->userAgent(),
        ]);
    }
}
