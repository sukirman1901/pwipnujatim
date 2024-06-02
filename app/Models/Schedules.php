<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Schedules extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'name',
        'phone_number',
        'email',
        'event_name',
        'summary',
        'thumbnail',
        'event_date',
    ];

    protected $casts = [
        'event_date' => 'date',
    ];
}
