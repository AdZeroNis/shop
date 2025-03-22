<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'inventory', 'price', 'status', 'Id_category', 'image', 'store_id'];

    public function category()
    {
        return $this->belongsTo(Category::class, 'Id_category');
    }

    public function store()
    {
        return $this->belongsTo(Store::class);
    }

    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}

