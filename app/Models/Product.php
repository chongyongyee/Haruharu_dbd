<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ProductImage;
use App\Models\Category;

class Product extends Model
{
    use HasFactory;

    protected $table ='products';
    protected $primaryKey ='productId';
    
    protected $fillable =[
        'productName',
        'categoryId',
        'productQuantity',
        'productOriginalPrice',
        'productSellingPrice',
        'productDescription'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class,'categoryId','categoryId');
    }

    public function productImages()
    {
        return $this->hasMany(ProductImage::class, 'productId', 'productId');
    }


}
