<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class HeroSections extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'achievement',
        'heading',
        'subheading',
        'path_video',
        'banner',
    ];
}
