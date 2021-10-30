<?php

namespace App\Model\Sales;

use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    protected $table = 'sales';
    protected $primaryKey = 'sales_id';

    protected $fillable = ['sales_id','product_id','user_id'];


}
