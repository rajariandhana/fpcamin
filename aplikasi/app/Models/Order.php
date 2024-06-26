<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    // public function orderMenus()
    // {
    //     return $this->hasMany(order_menu::class,'order_id');
    // }
    public function orderMenus()
    {
        return $this->hasMany(order_menu::class);
    }
}
