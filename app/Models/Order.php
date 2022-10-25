<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Order extends Model
{
    use HasFactory;

    protected $table ='orders';
    protected $primaryKey ='id';

    protected $fillable = [
        'userId',
        'tracking_no',
        'fullname',
        'email',
        'phone',
        'postcode',
        'address',
        'status_message',
        'paymentId',
        'payment_mode'
    ];

    /**
     * Get all of the orderItems for the Order
     * 
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */

    public function orderItems():HasMany
    {
        return $this->hasMany(OrderItem::class,'orderId','id' );
    }

   
}
