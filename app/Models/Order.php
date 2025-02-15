<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;


    protected $guarded = ["id"];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation to the OrderItem model
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    // If 'product_id' exists in orders table (optional)
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

