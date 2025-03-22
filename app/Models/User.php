<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable // Extend Authenticatable, not Model
{
    use HasFactory, Notifiable;

    protected $fillable = ['name', 'email', 'password', 'phone', 'address', 'role', 'status','store_id'];

    public function store()
    {
        return $this->belongsTo(Store::class, 'store_id');
    }

    public function baskets()
    {
        return $this->hasMany(Basket::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
