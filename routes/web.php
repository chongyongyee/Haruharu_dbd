<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();


Route::controller(App\Http\Controllers\Frontend\FrontendController::class)->group(function(){
    Route::get('/', 'index');
    Route::get('/collections', 'categories');
    Route::get('/collections/{categoryId}', 'products');
    Route::get('/collections/{categoryId}/{productId}', 'productView');
    Route::get('/new-arrivals', 'newArrival');
    Route::get('search', 'searchProducts');
});


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/faqs', [App\Http\Controllers\Frontend\FaqController::class, 'index']);
Route::get('/aboutus', [App\Http\Controllers\Frontend\AboutUsController::class, 'index']);
Route::get('thankyou', [App\Http\Controllers\Frontend\FrontendController::class, 'thankyou']);


//Requires login to add to cart, payment
Route::middleware(['auth'])->group(function(){
    Route::get('cart', [App\Http\Controllers\Frontend\CartController::class, 'index']);
    Route::get('checkout', [App\Http\Controllers\Frontend\CheckoutController::class, 'index']);
    Route::get('orders', [App\Http\Controllers\Frontend\OrderController::class, 'index']);
    Route::get('orders/{orderId}', [App\Http\Controllers\Frontend\OrderController::class, 'showOrder']);
    Route::get('profile', [App\Http\Controllers\Frontend\UserController::class, 'index']);
    Route::post('profile', [App\Http\Controllers\Frontend\UserController::class, 'updateUserDetails']);
    Route::get('change-password', [App\Http\Controllers\Frontend\UserController::class, 'passwordCreate']);
    Route::post('change-password', [App\Http\Controllers\Frontend\UserController::class, 'updatePassword']);
    
});


//admin route
Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function(){

    //dashboard
     Route::get('dashboard',[App\Http\Controllers\Admin\DashboardController::class,'index']);

     //webiste
     Route::get('/', [App\Http\Controllers\Frontend\FrontendController::class,'index']);

     //Supplier 
    Route::controller(App\Http\Controllers\Admin\SupplierController::class)->group(function(){
        Route::get('/supplier','index');
        Route::get('/supplier/create','create');
        Route::post('/supplier','store');
        Route::get('/supplier/{supplier}/edit','edit');
        Route::put('/supplier/{supplier}','update');
    });

     
    //Expenses 
    Route::controller(App\Http\Controllers\Admin\ExpensesController::class)->group(function(){
        Route::get('/expenses','index');
        Route::get('/expenses/create','create');
        Route::post('/expenses','store');
        Route::get('/expenses/{expenses}/edit','edit');
        Route::put('/expenses/{expenses}','update');
    });


    //Product Category
    Route::controller(App\Http\Controllers\Admin\CategoryController::class)->group(function(){
        Route::get('/category','index');
        Route::get('/category/create','create');
        Route::post('/category','store');
        Route::get('/category/{category}/edit','edit');
        Route::put('/category/{category}','update');
        
    });

    //Products
    Route::controller(App\Http\Controllers\Admin\ProductController::class)->group(function(){
        Route::get('/products','index');
        Route::get('/products/create','create');
        Route::post('/products','store');
        Route::get('/products/{product}/edit','edit');
        Route::put('/products/{product}','update');
        Route::get('products/{productId}/delete','destroy');
        //delete img
        Route::get('product-image/{productImageId}/delete', 'destroyImage');
        

    });

    //Order
    Route::controller(App\Http\Controllers\Admin\OrderController::class)->group(function(){
        Route::get('/orders','index');
        Route::get('/orders/{orderId}','show');
        Route::put('/orders/{orderId}','updateStatus');

        //generate and view invoice
        Route::get('/invoice/{orderId}','viewInvoice');
        Route::get('/invoice/{orderId}/generate','generateInvoice');

    });

    //Sales
    Route::controller(App\Http\Controllers\Admin\SalesController::class)->group(function(){
        Route::get('/sales','index');
        Route::get('/sales/{orderId}','show');
    });

    //Home Slider
    Route::controller(App\Http\Controllers\Admin\SliderController::class)->group(function(){
        Route::get('/sliders','index');
        Route::get('/sliders/create','create');
        Route::post('/sliders/create','store');
        Route::get('/sliders/{slider}/edit','edit');
        Route::put('/sliders/{slider}','update');
        Route::get('sliders/{slider}/delete','destroy');
    });

    //Data Analytics
    Route::controller(App\Http\Controllers\Admin\DataAnalyticsController::class)->group(function(){
        Route::get('/dataAnalytics','index');
    });

    //Report
    Route::controller(App\Http\Controllers\Admin\ReportController::class)->group(function(){
        //Business Report
        Route::get('/businessReport','businessIndex');
        Route::get('/businessReport/view','viewBusinessReport');
        Route::get('/businessReport/generate','generateBusinessReport');

        //Stock Report
        Route::get('/stockReport','stockIndex');
        Route::get('/stockReport/view','viewStockReport');
        Route::get('/stockReport/generate','generateStockReport');
    });

    //Forecasting
    Route::controller(App\Http\Controllers\Admin\ForecastingController::class)->group(function(){
        Route::get('/forecasting','index');
    });

});