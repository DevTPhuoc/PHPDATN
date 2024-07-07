<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "ordersdetail";

    public function product()
    {
        return $this->belongsTo(Products::class, 'product_order_detail_id');
    }

    public function order()
    {
        return $this->belongsTo(Order::class, 'order_id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'name');
    }
        
   
}
