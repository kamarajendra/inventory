<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/idx', function () {
//     return view('dashboard');
// });

Route::get('/items', function () {
    return view('items');
});


Route::middleware(['guest'])->group(function(){
    Route::get('/',[LoginController::class, 'index'])->name('login');
    Route::post('/',[LoginController::class, 'login']);
});

Route::get('/home', function(){
    return redirect('/staff');
});

Route::middleware(['auth'])->group(function(){
    
    Route::get('/staff',[StaffController::class, 'index']);

    Route::get('/staff/peminjam',[StaffController::class, 'peminjam']);
    Route::post('/staff/peminjam',[StaffController::class, 'store'])->name('staff.peminjam');

    Route::get('/staff/items',[StaffController::class, 'listItem']);
    Route::post('/staff/items',[StaffController::class, 'storeItem'])->name('staff.items');

    Route::get('/staff/user',[UserController::class, 'index']);
    Route::post('/staff/user',[UserController::class, 'store']);

    Route::get('/staff/unit',[StaffController::class, 'unitList']);
    Route::post('/staff/unit',[StaffController::class, 'saveUnit'])->name('staff.unit');

    Route::get('/staff/role',[StaffController::class, 'roleList']);
    Route::post('/staff/role',[StaffController::class, 'saveRole'])->name('staff.role');
    
    Route::get('/staff/specs',[StaffController::class, 'unit_specs']);
    Route::post('/staff/specs',[StaffController::class, 'store_specs'])->name('staff.specs');
    Route::delete('/staff/specs/delete/{id}',[StaffController::class, 'delete_specs'])->name('specs.delete');
    Route::post('/staff/specs/update/{id}',[StaffController::class, 'update_specs'])->name('specs.update');

    Route::get('/staff/location',[StaffController::class, 'unit_location']);
    Route::post('/staff/location',[StaffController::class, 'unit_location_create'])->name('staff.location.create');

    Route::get('/staff/product_type',[StaffController::class, 'product_type']);
    Route::post('/staff/product_type',[StaffController::class, 'product_type_create'])->name('staff.product_type.create');




    Route::get('/staff/setting',[StaffController::class, 'staff']);
    Route::get('/admin',[StaffController::class, 'admin'])->middleware('userAccess:admin');
    Route::get('/logout',[LoginController::class, 'logout']);

    // Route::middleware(['userAccess'])->group(function(){
    //     Route::get('/admin',[StaffController::class, 'admin']);
    // });

});