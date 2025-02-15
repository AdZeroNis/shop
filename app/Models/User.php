<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
         'phone',
         'address',
         'status'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relation to the Basket model (a user can have one or many items in their basket)
    public function basket()
    {
        return $this->hasMany(Basket::class);
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */


    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

}
