<?php
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('main');
})->name('main');

Route::get('/prod/{id}', function ($id){
    return view('prod', ['id' => $id]);
})->name('prod');

Route::get('/prod/order/{id}', function ($id){
    return view('buy-prod', ['id' => $id]);
})->name('order-prod');

Route::post("/buy-prod",[\App\Http\Controllers\ProdController::class,'buy'])->name('buy-prod');

Route::name('admin.')->group(function (){
    Route::view('/admin-panel','admin-panel')->middleware('auth')->name('admin-panel');
    Route::view('/products','admin-products')->middleware('auth')->name('products');
    Route::view('/admins','admin-admins')->middleware('auth')->name('admins');

    Route::view('/register','admin-register')->middleware('auth')->name('register');

    Route::post("/register",[\App\Http\Controllers\AdminRegisterController::class,'reg'])->name('register')->middleware('auth');
    Route::post("/add-new-prod",[\App\Http\Controllers\ProdController::class,'save'])->name('add-new-prod')->middleware('auth');
    Route::post("/edit-prod",[\App\Http\Controllers\ProdController::class,'update'])->name('edit-prod')->middleware('auth');
    Route::post("/delete-prod",[\App\Http\Controllers\ProdController::class,'delete'])->name('delete-prod')->middleware('auth');

    Route::post("/edit-admin",[\App\Http\Controllers\AdminController::class,'edit'])->name('edit-admin')->middleware('auth');
    Route::post("/delete-admin",[\App\Http\Controllers\AdminController::class,'delete'])->name('delete-admin')->middleware('auth');

    Route::post("/delete-order",[\App\Http\Controllers\OrdersController::class,'delete'])->name('delete-order')->middleware('auth');
    Route::post("/mark-done-order",[\App\Http\Controllers\OrdersController::class,'mark_done'])->name('mark-done-order')->middleware('auth');
    Route::post("/mark-execution-order",[\App\Http\Controllers\OrdersController::class,'mark_execution'])->name('mark-execution-order')->middleware('auth');

    Route::get('/login', function (){
        if(Auth::check()){
            return redirect(route('admin.admin-panel'));
        }
        return view('login-admin');
    })->name('login');

    Route::post('login',[App\Http\Controllers\AdminLoginController::class,'login'])->name('login');
    Route::get('logout',[\App\Http\Controllers\AdminLoginController::class,'logout'])->name('logout');

});

Route::post("search-prod",[\App\Http\Controllers\SearchController::class,'search'])->name("search-prod");
