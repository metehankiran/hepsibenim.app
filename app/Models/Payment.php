<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'address_id', 'payment_method_id', 'note', 'carts', 'status'];
    public function productCarts()
    {
        return $this->hasMany(ProductCart::class);
    }

    public function paymentMethod()
    {
        return $this->belongsTo(PaymentMethod::class);
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function address()
    {
        return $this->belongsTo(Address::class);
    }

    public function total()
    {
        $total = 0;
        foreach ($this->productCarts as $productCart) {
            $total += $productCart->quantity * $productCart->product->price;
        }
        return $total;
    }
}
