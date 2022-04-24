<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\ContactController;
use App\Http\Controllers\Backend\PaymentController as BackendPaymentController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\SettingController;
use App\Http\Controllers\Backend\SliderController;
use App\Http\Controllers\Backend\TicketController as BackendTicketController;
use App\Http\Controllers\Backend\UserController as BackendUserController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProductCartController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/setup', [HomeController::class, 'setup']);
Route::get('/storage-link', function(){
    Artisan::call('storage:link');
    return redirect()->back();
});
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/product/{product:slug}', [HomeController::class, 'product'])->name('product.show');
Route::get('/products', [HomeController::class, 'products'])->name('products');
Route::get('/category/{category:slug}', [HomeController::class, 'category'])->name('category');
Route::get('/shop-cart', [HomeController::class, 'productCart'])->name('product-cart');
Route::get('/about', [HomeController::class, 'about'])->name('about');
Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
Route::post('/contact-store', [HomeController::class, 'contactStore'])->name('contact.store');
Route::resource('/product-cart', ProductCartController::class);
Route::prefix('profile')->middleware('auth')->group(function() {
    Route::resource('user', UserController::class);
    Route::get('/', [HomeController::class, 'profile'])->name('user.profile');
    Route::get('/order-history', [PaymentController::class, 'orderHistory'])->name('order.history');
    Route::get('/payment-method', [UserController::class, 'paymentMethod'])->name('user.payment-method');
    Route::post('/payment-update', [UserController::class, 'paymentUpdate'])->name('user.payment.update');
    Route::get('/address', [UserController::class, 'address'])->name('user.address');
    Route::post('/address-update', [UserController::class, 'addressUpdate'])->name('user.address.update');
    Route::get('/user-suspend', [UserController::class, 'userSuspend'])->name('user.suspend');
    Route::resource('/user/payment', PaymentController::class);
    Route::resource('ticket', TicketController::class);
});
Route::prefix('admin')->name('backend.')->middleware(['auth','admin'])->group(function () {
    Route::get('/', [BackendController::class, 'index'])->name('admin.home');
    Route::resource('product', ProductController::class);
    Route::resource('category', CategoryController::class);
    Route::resource('slider', SliderController::class);
    Route::resource('brand', BrandController::class);
    Route::resource('payment', BackendPaymentController::class);
    Route::resource('ticket', BackendTicketController::class);
    Route::resource('contact', ContactController::class);
    Route::resource('setting', SettingController::class);
    Route::resource('user', BackendUserController::class);
});
