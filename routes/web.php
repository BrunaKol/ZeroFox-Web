<?php

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
/*
Route::get('/', function () {
    return view('welcome');
});
*/
/*naše rute koje koristimo u programu*/

Auth::routes();

Route::get('/prijava', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/', function() {
    return File::get(public_path() . '\index.html');
  });
Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users');
Route::get('/users/delete/{id}', [App\Http\Controllers\UsersController::class, 'delete'])->name('users.delete');
Route::post('/users/add', [App\Http\Controllers\UsersController::class, 'add'])->name('users.add');
Route::get('/users/edit/{id}', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
Route::put('/users/update/{user}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
Route::get('/profile/{user_id}', [App\Http\Controllers\ProfileController::class, 'show'])->name('profile.show');
Route::get('/guest', [App\Http\Controllers\GuestController::class, 'index'])->name('guest');



Route::get('/shop', [App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('/cart', [App\Http\Controllers\ProductController::class, 'cart'])->name('product.cart');
Route::get('/add-to-cart/{id}', [App\Http\Controllers\ProductController::class, 'addToCart'])->name('cart.add');
Route::patch('update-cart', [App\Http\Controllers\ProductController::class, 'update'])->name('cart.update');
Route::delete('remove-from-cart', [App\Http\Controllers\ProductController::class, 'remove'])->name('cart.remove');



