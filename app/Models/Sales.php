<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales extends Model
{
    use HasFactory;
    protected $table ='orders';
    protected $primarykey ='orderId';

    protected $fillable = [
        'orderStatus',
        'date',
        'productId',
        'productImageId',
        'customerId',
    ];
}
