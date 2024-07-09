<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Suppliers;
use App\Models\Size;
class Products extends Model
{
    use HasFactory;
    
    protected $table = "products";

    public function suppliers()
    {
        return $this->belongsTo(Suppliers::class, 'suppliers_id', 'id');
    }

    public function promotion()
    {
        return $this->belongsTo(Promotion::class, 'promotions_id', 'id');
    }

    public function categories()
    {
        return $this->belongsTo(Categories::class, 'categories_product_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'size_id', 'id');
    }

    public function colors()
    {
        return $this->belongsTo(Color::class, 'color_product_id', 'id');
    }

    public function productDetails()
    {
        return $this->hasMany(ProductDetail::class, 'product_id', 'id');
    }

    public function images()
    {
        return $this->hasMany(Image::class, 'product_id', 'id');
    }
}
