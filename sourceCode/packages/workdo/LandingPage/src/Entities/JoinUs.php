<?php

namespace Workdo\LandingPage\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class JoinUs extends Model
{
    use HasFactory;

    protected $table = 'join_us';

    protected $fillable = ['email'];
}
