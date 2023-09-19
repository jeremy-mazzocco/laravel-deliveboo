<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_code',
        'customer_name',
        'customer_address',
        // 'time',
        'total_price',
        'phone_number',
        'email',
        'status'
    ];

    public function dishes() {

        return $this -> belongsToMany(Dish :: class, 'dish_order')
        ->withPivot('amount');
    }
}
