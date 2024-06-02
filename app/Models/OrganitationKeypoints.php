<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class OrganitationKeypoints extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'organitation_about_id',
        'keypoint',
    ];

    public function about(){
        return $this->belongsTo(OrganitationAbouts::class,'organitation_about_id');
    }
}
