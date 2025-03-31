<?php

namespace App\Models;

use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\InteractsWithMedia;

class NotificationSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table = "settings";

    public function getFileAttribute(): string
    {
        if (!empty($this->getFirstMediaUrl('notification-file'))) {
            return asset($this->getFirstMediaUrl('notification-file'));
        }
        return '';
    }
}
