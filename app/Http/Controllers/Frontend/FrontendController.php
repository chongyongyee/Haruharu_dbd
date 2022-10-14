<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Category;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index()
    {
        $sliders = Slider::where('status','0')->get();
        return view('frontend.index', compact('sliders'));
    }

    public function categories()
    {
        $categories = Category::get();
        return view('frontend.collections.category.index',compact('categories'));
    }

    // get all the product
    public function products($categoryId)
    {
        $category= Category::where('categoryId',$categoryId)->first();

        if($category){
            // $products = $category->products()->get();
            return view('frontend.collections.products.index',compact('category'));

        }else{
            return redirect()->back();
        }
    }

    public function productView(string $categoryId, string $productId)
    {
        $category= Category::where('categoryId',$categoryId)->first();

        if($category){

            $product = $category->products()->where('productId', $productId)->first();
            if($product)
            {
                return view('frontend.collections.products.view',compact('product','category'));
            }else{
                return redirect()->back();
            }
            

        }else{
            return redirect()->back();
        }

    }

    public function thankyou()
    {
        return view('frontend.thankyou');
    }
}
