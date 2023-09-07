<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $fillable = [
        'dish_name',
        'description',
        'price',
        'img',
        'visibility',
        'deleted',
        'user_id'
    ];

    public function users() {

        return $this -> belongsTo(User :: class);
    }

    public function orders() {

        return $this -> belongsToMany(Order :: class, 'dish_order')
        ->withPivot('amount');
    }

}
