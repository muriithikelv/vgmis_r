<?php

namespace App\Model\Sacco;

use App\User;
use Illuminate\Database\Eloquent\Model;

class CountyCoordinator extends Model
{
    protected $table = 'county_coordinators';
    protected $primaryKey = 'county_coordinators_id';

    protected $fillable = [
        'county_coordinators_id', 'user_id', 'sacco_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}