<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Products;
use App\Models\Cart;


class CartsDetail extends Model
{
    use HasFactory;
    protected $table = "cartsdetail";
    public $timestamps = false;
    public function products() {

        return $this->hasMany(Products::class, 'id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'id');
    }
    public function cart() {

        return $this->hasMany(Cart::class);
    }
}
