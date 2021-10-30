<?php

namespace App\Model\Market;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'category';
    protected $primaryKey = 'category_id';

    protected $fillable = [
        'category_id', 'category_name', 'description'
    ];
}
