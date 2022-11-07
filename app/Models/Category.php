<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'categoryId';

    protected $fillable =[
        'category',
        'date'
    ];

    public function products()
    {
        return $this->hasMany(Product::class,'categoryId','categoryId');
    }
    public function orderItems()
    {
        return $this->hasManyThrough(
            OrderItem::class,
            Product::class,
            'categoryId', // Foreign key on the environments table...
            'productId', // Foreign key on the deployments table...
            'categoryId', // Local key on the projects table...
            'productId' // Local key on the environments table...
        );
    }
}
