<?php

namespace App\Model\Settings;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    protected $table = 'region';
    protected $primaryKey = 'region_id';

    protected $fillable = [
        'region_id', 'region_name', 'location_id'
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
