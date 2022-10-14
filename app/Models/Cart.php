<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Product;

class Cart extends Model
{
    use HasFactory;

    protected $table = 'carts';

    protected $fillable =[
        'userId',
        'productId',
        'quantity',

    ];

    /**
     * Get the user that owns the Cart
     * 
     * @return \Illumincate\Database\Eloquent\Relations\BelongsTo
     */

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class,'productId','productId');
    }
}
