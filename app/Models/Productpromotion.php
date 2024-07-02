<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productpromotion extends Model
{
    use HasFactory;
    protected $table = "productpromotion";
    public function Promotion()
    {
        return $this->belongsTo(Promotion::class, 'code_promotion ','id');
        
    }

}
