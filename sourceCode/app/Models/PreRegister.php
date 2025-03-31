<?php

namespace App\Models;

use App\Models\User;
use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;
use Shipu\Watchable\Traits\HasAuditColumn;

class PreRegister extends Model
{
    use HasAuditColumn;

    protected $table = 'pre_registers';
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

    public function visitor()
    {
        return $this->belongsTo(Visitor::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function getMyStatusAttribute()
    {
        return $this->status == Status::ACTIVE ? '<span class="text-green-600 bg-green-100 db-table-badge">' . trans('statuses.' . $this->status) . '</span>' : '<span class="text-red-600 bg-red-100 db-table-badge">' . trans('statuses.' . $this->status) . '</span>';
    }

}
