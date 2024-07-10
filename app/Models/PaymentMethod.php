<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
    ];

    // Nếu cần có quan hệ với các bảng khác, hãy định nghĩa ở đây
    // Ví dụ: mỗi phương thức thanh toán có nhiều thanh toán
    public function payments()
    {
        return $this->hasMany(Payment::class);
    }
}
