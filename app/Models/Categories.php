<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class Categories extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
        'icon',
    ];

    protected $guarded = [
        'id',
    ];

    public function blog(){
        return $this->hasMany(Blogs::class)->onDelete('cascade');;
    }
}

