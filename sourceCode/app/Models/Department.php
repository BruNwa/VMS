<?php

namespace App\Models;

use App\Enums\Status;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table = 'departments';
    protected $guarded = ['id'];
    protected $fillable = [
        'name','status'
    ];
    protected $fakeColumns = [];
    public $timestamps = false;

    public function getStatusNameAttribute()
    {
        return $this->status == Status::ACTIVE ? '<span class="text-green-600 bg-green-100 db-table-badge">' . trans('statuses.' . $this->status) . '</span>' : '<span class="text-red-600 bg-red-100 db-table-badge">' . trans('statuses.' . $this->status) . '</span>';
    }
}
