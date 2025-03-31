<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class ThemeSetting extends Model implements HasMedia
{
    use InteractsWithMedia;

    protected $table    = "settings";
    public $timestamps  = false;
    protected $guarded  = [];


    public function getLogoAttribute()
    {

        if (!empty($this->getFirstMediaUrl('site-logo'))) {
            return asset($this->getFirstMediaUrl('site-logo'));
        }
        return asset('images/site_logo.png');
    }

    public function getFaviconAttribute(): string
    {
        $mediaUrl = $this->getFirstMediaUrl('fav-icon');
        return $mediaUrl ? asset($mediaUrl) : asset('images/favicon.png');
    }
}
