<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class OurTeams extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'name',
        'occupation',
        'avatar',
        'location',
    ];
}
