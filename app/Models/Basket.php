<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Basket extends Model
{    use HasFactory;


    protected $guarded = ["id"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation to the Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}

