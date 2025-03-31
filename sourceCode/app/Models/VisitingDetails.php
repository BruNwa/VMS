<?php

namespace App\Models;

use App\Models\User;
use Spatie\MediaLibrary\HasMedia;
use Illuminate\Database\Eloquent\Model;
use Shipu\Watchable\Traits\HasAuditColumn;
use Spatie\MediaLibrary\InteractsWithMedia;


class VisitingDetails extends Model implements  HasMedia
{
    use InteractsWithMedia;
    use HasAuditColumn;

    protected $table = 'visiting_details';
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function visitor()
    {
        return $this->belongsTo(Visitor::class,'visitor_id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function attendance()
    {
        return $this->hasMany(Attendance::class, 'employee_id');
    }

    public function getMyStatusAttribute()
    {
        return trans('statuses.' . $this->status);
    }

    public function getImagesAttribute()
    {
        if (!empty($this->getFirstMediaUrl('visitor'))) {
            return asset($this->getFirstMediaUrl('visitor'));
        }
        return asset('images/user.png');
    }

    public function getStatusNameAttribute()
    {
        if($this->status == \App\Enums\VisitorStatus::PENDDING) {
            return '<span class="text-yellow-600 bg-yellow-100 db-table-badge">' . trans('visitor_statuses.' . $this->status) . '</span>';

        } elseif($this->status == \App\Enums\VisitorStatus::ACCEPT ) {
            return '<span class="text-green-600 bg-green-100 db-table-badge">' . trans('visitor_statuses.' . $this->status) . '</span>';
        } else {
            return '<span class="text-red-600 bg-red-100 db-table-badge">' . trans('visitor_statuses.' . $this->status) . '</span>';
        }
    }
}
