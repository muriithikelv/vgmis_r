<?php

namespace App\Model\Audit;

use Illuminate\Database\Eloquent\Model;

class Audit extends Model
{
    protected $table = 'audit_trail';
    protected $primaryKey = 'trail_id';

    protected $fillable = [
        'trail_id', 'user_name', 'action', 'user_id', 'created_by', 'updated_by'
    ];

}
