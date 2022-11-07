<?php

namespace App\Models;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = 'order_items';

    protected $fillable = [
        'orderId',
        'productId',
        'quantity',
        'price'
    ];

    public function sales()
    {
        return $this->sum('price');
    }

    public function monthlySales()
    {
        return $this->sum('price');
    }

    /**
     * Get the product that owns the OrderItem
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */

    public function product(): BelongsTo
    {
        return $this->belongsTo(Product::class,'productId','productId');
    }

    public function orders()
    {
        return $this->belongsTo(Order::class);
    }

}
