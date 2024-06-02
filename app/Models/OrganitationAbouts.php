<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class OrganitationAbouts extends Model
{
    use HasFactory, HasRoles, SoftDeletes;

    protected $fillable = [
        'name',
        'thumbnail',
        'type',
    ];

    public function keypoints() {
    return $this->hasMany(OrganitationKeypoints::class, 'organitation_about_id');
}

}
