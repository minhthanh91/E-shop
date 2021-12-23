<?php

use Illuminate\Support\Facades\Route;
use App\Models\User;
use App\Http\Controllers\userController;
use App\Http\Controllers\productController;

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

Route::view('/register', 'register');
Route::post('/register', [userController::class, 'register']);
Route::view('/login', 'login');
Route::post('/login', [userController::class, 'logIn']);
Route::get('/logout', [userController::class, 'logOut']);

Route::redirect('/', '/products');
Route::get('/products', [productController::class, 'getAllProducts']);
Route::get('/products/{id}', [productController::class, 'getProduct']);

Route::post('/add_to_cart', [productController::class, 'addToCart']);

Route::get('/cartlist', [productController::class, 'showCart']);
Route::get('/cartlist/remove/{id}', [productController::class, 'removeCartItem']);

Route::get('/order', [productController::class, 'order']);
Route::post('/confirm_order', [productController::class, 'confirmOrder']);

Route::get('/myorders', [productController::class, 'myOrders']);
Route::get('/search', [productController::class, 'search']);


// for check & test
Route::get('/view_info/tables/{tableName}', [productController::class, 'viewTable']);
Route::get('/view_info/test', [productController::class, 'test']);