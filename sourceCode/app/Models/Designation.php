<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class Designation extends Model
{
    protected $table = 'designations';
    protected $guarded = ['id'];
    protected $fillable = [
        'name','status'
    ];
    protected $fakeColumns = [];

    public $timestamps = false;

    protected $casts = [

    ];

    public function getStatusNameAttribute()
    {
        return $this->status == Status::ACTIVE ? '<span class="db-table-badge text-green-600 bg-green-100">' . trans('statuses.' . $this->status) . '</span>' : '<span class="db-table-badge text-red-600 bg-red-100">' . trans('statuses.' . $this->status) . '</span>';
    }
}
