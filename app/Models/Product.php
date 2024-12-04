<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    // فیلدهای محافظت‌شده
    protected $guarded = ["id"];

    // رابطه محصول با دسته‌بندی
    public function category()
    {
        return $this->belongsTo(Category::class, 'Id_category', 'id');
    }
}
