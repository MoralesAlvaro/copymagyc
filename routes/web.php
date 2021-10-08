<?php
use App\Http\Controllers\ParameterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RawMaterialsController;




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
})->middleware(['auth'])->name('login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::group([
], function () { 
    // Route::get('user.register', [UserController::class, 'index'])->name('/user/register');
    Route::resource('user', UserController::class)->middleware(['auth']);
    Route::resource('supplier', SupplierController::class)->middleware(['auth']);
    Route::resource('customers', CustomerController::class)->middleware(['auth']);
    Route::resource('parameter', ParameterController::class)->middleware(['auth']);
    Route::resource('raw_materials', RawMaterialsController::class)->middleware(['auth']);

});

require __DIR__.'/auth.php';
