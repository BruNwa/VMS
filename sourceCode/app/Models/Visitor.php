<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Support\Str;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Shipu\Watchable\Traits\HasAuditColumn;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia\HasMediaTrait;


class Visitor extends Model implements  HasMedia
{
    use Notifiable;
    use InteractsWithMedia;
    use HasAuditColumn;


    protected $table = 'visitors';
    protected $guarded = ['id'];
    protected $auditColumn = true;

    protected $fakeColumns = [];

    public function creator()
    {
        return $this->morphTo();
    }

    public function editor()
    {
        return $this->morphTo();
    }

    public function invitation()
    {
        return $this->hasOne(PreRegister::class);
    }
    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function preregister()
    {
        return $this->hasOne(PreRegister::class);
    }

    public function getNameAttribute()
    {
        return $this->first_name . ' ' . $this->last_name;
    }

    public function getMyGenderAttribute()
    {
        return trans('genders.' . $this->gender);
    }
    public function getImagesAttribute()
    {
        if (!empty($this->getFirstMediaUrl('visitor'))) {
            return asset($this->getFirstMediaUrl('visitor'));
        }
        return asset('images/user.png');
    }

    public function getQrcodeAttribute()
    {
        if (!empty($this->getFirstMediaUrl('qrcode'))) {
            return asset($this->getFirstMediaUrl('qrcode'));
        }
        return asset('images/user.png');
    }

    public function routeNotificationForTwilio()
    {
        return $this->phone;
    }

    public function getMyStatusAttribute()
    {
        return $this->status == Status::ACTIVE ? '<span class="text-green-600 bg-green-100 db-table-badge">' . trans('statuses.' . $this->status) . '</span>' : '<span class="text-red-600 bg-red-100 db-table-badge">' . trans('statuses.' . $this->status) . '</span>';
    }

    public function getCountryCodeWithPhoneAttribute()
    {
        return '+'.$this->country_code .''. $this->phone;
    }

}
