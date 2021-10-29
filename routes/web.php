<?php
use App\Http\Controllers\ParameterController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\RawMaterialController;
use App\Http\Controllers\StationeryTypeController;
use App\Http\Controllers\AtivityRawController;
use App\Http\Controllers\PasswordResetLinkController;


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
    return redirect('login');
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
    Route::resource('rawMaterials', RawMaterialController::class)->middleware(['auth']);
    Route::resource('stationeryTypes', StationeryTypeController::class)->middleware(['auth']);
    Route::get('parameter/edit', [ParameterController::class, 'edit'])->middleware(['auth'])->name('parameter.edit');
    Route::PATCH('parameter/update', [ParameterController::class, 'update'])->middleware(['auth'])->name('parameter.update');
    Route::get('parameter/show', [ParameterController::class, 'show'])->middleware(['auth'])->name('parameter.show');
    
    // Reportes
    Route::post('activity_raw/store/{id}', [AtivityRawController::class, 'store'])->middleware(['auth'])->name('activity_raw.store');
    Route::post('activity_raw/update/{id}', [AtivityRawController::class, 'update'])->middleware(['auth'])->name('activity_raw.update');
    // Rango de fechas
    Route::get('activity_raw/date', [AtivityRawController::class, 'date'])->middleware(['auth'])->name('activity_raw.date');
    Route::post('activity_raw/exportDate', [AtivityRawController::class, 'exportDate'])->middleware(['auth'])->name('activity_raw.exportDate');
    // Mensual
    Route::get('activity_raw/mount', [AtivityRawController::class, 'mount'])->middleware(['auth'])->name('activity_raw.mount');
    Route::get('activity_raw/exportPdf', [AtivityRawController::class, 'exportPdf'])->middleware(['auth'])->name('activity_raw.exportPdf');

    // Reseteo de contraseña
    Route::get('forgot-password', [PasswordResetLinkController::class, 'create'])->middleware(['auth'])->name('forgot-password');
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store'])->middleware(['auth'])->name('forgot-password');
    Route::post('update-password', [UserController::class, 'update_password'])->middleware(['auth'])->name('update-password');
});


require __DIR__.'/auth.php';
