<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CustomerController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $customerController = new CustomerController();
    $highestSpender = $customerController->highestSpender();
    $highestOrderCount = $customerController->highestOrderCount();

    return view('welcome', compact('highestSpender', 'highestOrderCount'));
});
