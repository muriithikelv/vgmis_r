<?php

namespace App\Model\Farm;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Farmer extends Model
{
    protected $table = 'farmer';
    protected $primaryKey = 'farmer_id';

    protected $fillable = [
        'farmer_id', 'farmer_name'
    ];


}
