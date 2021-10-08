<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers;
use App\Http\Controllers\HomeController;


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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*naše rute koje koristimo u programu*/

Auth::routes();



//Route::get('/', function() {
  //return File::get(public_path() . '\index.html');
// });
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [App\Http\Controllers\StartController::class, 'start'])->name('start');

Route::get('/guest', [App\Http\Controllers\GuestController::class, 'index'])->name('guest');


Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'delete'])->name('users.delete');
Route::post('/users/add', [App\Http\Controllers\UsersController::class, 'add'])->name('users.add');
Route::get('/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{user}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');

Route::get('/shop/{id}', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
//Route::get('shop/{id}', 'ProductController@index')->name('product');
Route::get('/shop', [App\Http\Controllers\ProductController::class, 'shop'])->name('shop');
Route::get('/cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('product.cart');
Route::get('/add-to-cart/{id}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('cart.add');
Route::patch('update-cart', [App\Http\Controllers\ProductController::class, 'update'])->name('cart.update');
Route::delete('remove-from-cart', [App\Http\Controllers\ProductController::class, 'remove'])->name('cart.remove');

Route::get('/final', [App\Http\Controllers\OrderController::class, 'final'])->name('final');
Route::post('/checkout', [App\Http\Controllers\OrderController::class, 'checkout'])->name('checkout');






Route::get('/profile/{user_id}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::post('/profile/add', [App\Http\Controllers\ProfileController::class, 'add'])->name('profile.add');
Route::get('/mineprofile', [App\Http\Controllers\ProfileController::class, 'mineprofile'])->name('mineprofile');


Route::post('/address/add', [App\Http\Controllers\AddressController::class, 'add'])->name('address.add');
Route::get('/address/{user_id}', [App\Http\Controllers\AddressController::class, 'show'])->name('address.show');
Route::get('/mine', [App\Http\Controllers\AddressController::class, 'mine'])->name('mine');







