<?php

namespace App\Model\Market;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'product';
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_id', 'user_id','bought_by', 'vendor_id', 'name', 'description', 'category_id', 'price', 'delivery_cost', 'product_image_1', 'product_image_2', 'product_image_3','status'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
        return $this->belongsTo(User::class,'bought_by');
    }

    public function vendor()
    {
        return $this->belongsTo(Vendor::class, 'vendor_id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
