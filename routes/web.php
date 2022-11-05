<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\TransactionController;
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

Route::get('/', function () {
 echo("oureducation backend Developer task");
});

/**
 * Users
 */
Route::get('users', [UserController::class, 'index']);
Route::get('import-users', [UserController::class, 'import']);


/**
 * Transactions
 */
Route::get('transactions', [TransactionController::class, 'index']);
Route::get('import-transactions', [TransactionController::class, 'import']);

