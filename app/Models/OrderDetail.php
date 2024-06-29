<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;
class OrderDetail extends Model
{
    use HasFactory;
    protected $table = "ordersdetail";

    public function ordersdetail()
    {
        return $this->belongsTo(Product::class, 'product_order_detail_id');
    }
    public function order()
    {
        return $this->belongsTo(Size::class, 'name');
    }

    public function color()
    {
        return $this->belongsTo(Color::class, 'name');
    }

    
}
