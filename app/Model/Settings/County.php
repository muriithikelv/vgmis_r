<?php

namespace App\Model\Settings;

use Illuminate\Database\Eloquent\Model;

class County extends Model
{
    protected $table = 'county';
    protected $primaryKey = 'county_id';

    protected $fillable = [
        'county_id', 'county_name'
    ];
}
