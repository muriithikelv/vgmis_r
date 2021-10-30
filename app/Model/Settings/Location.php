<?php

namespace App\Model\Settings;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $primaryKey = 'location_id';

    protected $fillable = [
        'location_id', 'location_name', 'county_id',
    ];


    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }
}
