<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;
class Suppliers extends Model
{
    use HasFactory;
    protected $table = "suppliers";
    public function products()
    {
        return $this->hasMany(Products::class);
    }
    // Trong model Suppliers.php
    public static $rules = [
        'name' => 'required|unique:suppliers,name',
        'email' => 'required|email|unique:suppliers,email',
        'phone' => 'required',
        'address' => 'required',
        'status' => 'required',
    ];

    public function validate($data)
    {
        return Validator::make($data, static::$rules);
    }

}
