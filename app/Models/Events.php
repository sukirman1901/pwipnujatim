<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Permission\Traits\HasRoles;

class Events extends Model
{
    use HasFactory, HasRoles, SoftDeletes;
    
    protected $fillable = [
        'name',
        'summary',
        'thumbnail',
        'event_client_id',
        'event_date',
    ];

    public function client(){
        return $this->belongsTo(EventClients::class, 'event_client_id');
    }
}
