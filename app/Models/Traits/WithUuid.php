<?php

namespace App\Models\Traits;

use Illuminate\Support\Str;

trait WithUuid {
    
    public static function bootWithUuid()
    {
        // parent::boot();
        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Str::uuid();
        });
    }

    public function initializeWithUuid()
    {
        $this->incrementing = false;
        $this->keyType = 'string';
    }
}