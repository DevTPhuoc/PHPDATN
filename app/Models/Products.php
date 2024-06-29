<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";

    public function suppliers()
    {
        return $this->belongsTo(Suppliers::class, 'suppliers_product_id	');
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotion_product_id');
        
    }
    public function categories() {
        return $this->belongsTo(Categories::class, 'categories_product_id');
    }
    public function product_detail()
    {
        return $this->hasMany(ProductDetai::class, 'san_pham_id');
    }
}
