<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    protected $table = "images";
    public $timestamps = false; // Tắt tính năng tự động thêm created_at và updated_at

    protected $fillable = [
        'product_id',
        'name',
    ];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
