<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorite_product_user', 'product_id', 'user_id');
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }


    protected $fillable = [
        'name',
        'description',
        'price',
        'location',
        'type',
        'telephone',
        'image',
        'verified',
        'hidden'
    ];

}
