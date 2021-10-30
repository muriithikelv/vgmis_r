<?php

namespace App\Model\Farm;

use App\Model\Settings\County;
use App\Model\Settings\Location;
use App\User;
use Illuminate\Database\Eloquent\Model;

class Vet extends Model
{
    protected $table = 'vet';
    protected $primaryKey = 'vet_id';

    protected $fillable = [
        'vet_id', 'user_id', 'approved', 'vet_name', 'county_id', 'location_id', 'region_id', 'profile_image', 'id_image', 'vet_certificate'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function county()
    {
        return $this->belongsTo(County::class, 'county_id');
    }

    public function location()
    {
        return $this->belongsTo(Location::class, 'location_id');
    }
}
