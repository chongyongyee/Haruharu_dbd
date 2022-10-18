<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\ProductImage;
use App\Models\Product;
use App\Http\Requests\ProductFormRequest;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    protected $paginationTheme = 'bootstrap';

    public function index()
    {
        
        $products = Product::paginate(5);
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        //link to category modal to get category name
        $category = Category::all();
        //$size = Size::where('status','0')->get();
        // return view('admin.products.create',compact('category', 'size'));
        return view('admin.products.create',compact('category'));
    }

    public function store(ProductFormRequest $request)
    {
        $validatedData = $request->validated();

        $category = Category::findOrFail($validatedData['categoryId']);

        $product = $category->products()->create([
            'categoryId' => $validatedData['categoryId'],
            'productName' =>$validatedData['name'],
            'productQuantity' =>$validatedData['productQuantity'],
            'productOriginalPrice' =>$validatedData['originalPrice'],
            'productSellingPrice' =>$validatedData['sellingPrice'],
            'productDescription' =>$validatedData['description'],
            'trending' =>$request->trending == true ? '1':'0'

        ]);


        //check image 
        $i = 1;
        if($request->hasFile('image')){
            $uploadPath = 'uploads/products/';

            //loop if have multiple image
            foreach($request->file('image') as $imageFile){
                $extention = $imageFile->getClientOriginalExtension();
                $filename = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                //create crud
                $product->productImages()->create([
                    'productId' => $product->id,
                    'image' => $finalImagePathName,
                ]);
            }
        }


        return redirect('/admin/products')->with('message','Product Added Successfully');
        
        //return $product->id;
        
    }

    public function edit(int $productId)
    {
        $category = Category::all();
        $product = Product::findOrFail($productId);

        return view('admin.products.edit',compact('category','product'));
    }

    public function update(ProductFormRequest $request, int $productId)
    {
        $validatedData = $request->validated();
        $product = Category::findOrFail($validatedData['categoryId'])
                        ->products()->where('productId', $productId)->first();
        if($product)
        {
            $product->update([
                'categoryId' => $validatedData['categoryId'],
                'productName' =>$validatedData['name'],
                'productQuantity' =>$validatedData['productQuantity'],
                'productOriginalPrice' =>$validatedData['originalPrice'],
                'productSellingPrice' =>$validatedData['sellingPrice'],
                'productDescription' =>$validatedData['description'],
                'trending' =>$request->trending == true ? '1':'0'
    
            ]);

            //check image 
            $i = 1;
            if($request->hasFile('image')){
                $uploadPath = 'uploads/products/';

                //loop if have multiple image
                foreach($request->file('image') as $imageFile){
                    $extention = $imageFile->getClientOriginalExtension();
                    $filename = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;

                    //create crud
                    $product->productImages()->create([
                        'productId' => $product->id,
                        'image' => $finalImagePathName,
                    ]);
                }
            }


            return redirect('/admin/products')->with('message','Product Updated Successfully');
    
        }
        else
        {
            return redirect('admin/products')->with('message', 'No Such Product Id Found');
        }

    }

    public function destroyImage(int $productImageId)
    {
        $productImage = ProductImage::findOrFail($productImageId);
        //check image 
        if(File::exists($productImage->image)){
            File::delete($productImage->image);

        }
        $productImage->delete();
        return redirect()->back()->with('message', 'Product Image Deleted');

    }

    public function destroy(int $productId)
    {
        $product = Product::findOrFail($productId);

        //delete img first
        if ($product->productImages()){
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message', 'Product Deleted');
    }


}
