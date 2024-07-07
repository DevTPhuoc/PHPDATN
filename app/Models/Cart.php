<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Users;
use App\Models\Products;

class Cart extends Model
{
    use HasFactory;
    protected $table = "carts";

    public function products() {

        return $this->hasMany(Products::class);
    }
    public function users() {

        return $this->belongsto(Users::class);
    }
}
