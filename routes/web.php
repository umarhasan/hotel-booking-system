<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\GeneralSettingController;
use App\Http\Controllers\GoogleCalendarController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\RoomTypeController;

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
Route::get('/', function () {
  return view('auth.login');
});

// Change file
Route::get('/google-calendar/connect', [GoogleCalendarController::class,'connect']);
Route::get('/signup', [RegisterController::class, 'register_form'])->name('signup');
Route::get('logout', [LoginController::class, 'logout']);
Route::get('account/verify/{token}', [LoginController::class, 'verifyAccount'])->name('user.verify');
// Route::get('/', [HomeController::class,'index']);
Route::get('/detail/{id}', [HomeController::class,'product_detail'])->name('product.detail');
Auth::routes(['verify' => false]);
Route::group(['middleware' => ['auth']], function(){
    Route::get('/change_password', [DashboardController::class, 'change_password'])->name('change_password');
    Route::post('/store_change_password', [DashboardController::class, 'store_change_password'])->name('store_change_password');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);

    // Start Hotels/Hotels-Room/Room-bookings
    Route::resource('hotels', HotelController::class);
    Route::resource('hotels.rooms', RoomController::class);
    Route::get('hotels/{hotel}/rooms', [RoomController::class,'index'])->name('hotels.rooms');

    // Room Image Management Routes
    Route::get('/hotels/{hotel}/rooms/{room}/images', [RoomController::class, 'indexImages'])->name('hotels.rooms.images.index');  // List images
    Route::get('/hotels/{hotel}/rooms/{room}/images/create', [RoomController::class, 'createImages'])->name('hotels.rooms.images.create');  // Create image
    Route::post('/hotels/{hotel}/rooms/{room}/images', [RoomController::class, 'storeImages'])->name('hotels.rooms.images.store');  // Store image
    Route::get('/hotels/{hotel}/rooms/{room}/images/{image}/edit', [RoomController::class, 'editImages'])->name('hotels.rooms.images.edit');  // Edit image
    Route::put('/hotels/{hotel}/rooms/{room}/images/{image}', [RoomController::class, 'updateImages'])->name('hotels.rooms.images.update');  // Update image
    Route::delete('/hotels/{hotel}/rooms/{room}/images/{image}', [RoomController::class, 'destroyImage'])->name('hotels.rooms.images.destroy');  // Delete image
    Route::resource('room-types', RoomTypeController::class);

    // Start Hootes-Room-Bookings
    Route::match(['get', 'post'], 'booking/search', [BookingController::class, 'search'])->name('booking.search');
    Route::get('booking/{room}/create', [BookingController::class, 'create'])->name('booking.create');
    Route::post('booking/store', [BookingController::class, 'store'])->name('booking.store');
    Route::get('bookings', [BookingController::class, 'index'])->name('booking.index');
    Route::get('booking/{booking}', [BookingController::class, 'show'])->name('booking.show');
    Route::delete('booking/{booking}', [BookingController::class, 'destroy'])->name('booking.destroy');
    Route::get('booking/{booking}/invoice', [BookingController::class, 'generateInvoice'])->name('booking.invoice');
    Route::get('booking/{booking}/invoice/print', [BookingController::class, 'printInvoice'])->name('booking.invoice.print');
    // End Hotels-Room-bookings

    Route::resource('permission', PermissionController::class);
    Route::resource('mail', MailController::class);
    Route::resource('users', UserController::class);
  	Route::get('user/fetch', [UserController::class, 'assign_user'])->name('user.fetch');
    Route::get('user/permission/{id}', [UserController::class, 'user_permission'])->name('users.permission');
    Route::post('user/permission/update/{id}', [UserController::class, 'user_permission_update'])->name('user.permission.update');
    Route::resource('category', CategoryController::class);
    Route::resource('subcategory', SubCategoryController::class);
    Route::get('/profile', [DashboardController::class, 'profile'])->name('profile.index');
    Route::post('/profile/image', [DashboardController::class, 'profileupdate'])->name('user.update');
    Route::resource('pages',PageController::class);
    Route::resource('general_setting',GeneralSettingController::class);
    
});


// Add cart
Route::post('addcart', [CheckoutController::class, 'addcart'])->name('addcart');
Route::get('ajaxcart', [CheckoutController::class, 'ajaxcart'])->name('cart.ajax');
Route::get('cart', [CheckoutController::class, 'cart'])->name('cart');
Route::post('updatecart', [CheckoutController::class, 'updatecart'])->name('updatecart');
Route::get('deletecart', [CheckoutController::class, 'deletecart'])->name('deletecart');
Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('post_checkout', [CheckoutController::class, 'post_checkout'])->name('post_checkout');

// Add Wishlist
Route::post('addwishlist', [CheckoutController::class, 'addwishlist'])->name('addwishlist');
