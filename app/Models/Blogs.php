<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Blogs extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'thumbnail',
        'category_id',
        'author_id',
    ];

    public function category(){
        return $this->belongsTo(Categories::class);
    }

    public function author(){
        return $this->belongsTo(Authors::class);
    }
}
