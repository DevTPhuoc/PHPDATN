<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suppliers;

class Products extends Model
{
    use HasFactory;
    protected $table = "products";

    public function suppliers()
    {
        return $this->belongsTo(Suppliers::class, 'suppliers_id','id');
    }
    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotions_id','id');
        
    }
    public function categories() {
        return $this->belongsTo(Categories::class, 'categories_product_id');
    }
    // public function product_detail()
    // {
    //     return $this->hasMany(ProductsDetai::class, 'san_pham_id');
    // }
    

}
