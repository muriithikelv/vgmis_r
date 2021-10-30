<?php

namespace App\Model\Training;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Training extends Model
{
    protected $table = 'training';
    protected $primaryKey = 'training_id';

    protected $fillable = [
        'training_id', 'title', 'description', 'status', 'url', 'created_by'
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
