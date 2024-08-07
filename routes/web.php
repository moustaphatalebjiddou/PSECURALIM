<?php
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\WilayaController; // Assurez-vous d'utiliser le bon espace de noms

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

// User Management
Route::get('/all-user', [UserController::class, 'AllUser'])->name('alluser');
Route::get('/add-user', [UserController::class, 'AddUser'])->name('adduser');
Route::post('/insert-user', [UserController::class, 'InsertUser'])->name('insertuser');
Route::get('/edit-user/{id}', [UserController::class, 'EditUser'])->name('Edituser');
Route::post('/update-user/{id}', [UserController::class, 'UpdateUser'])->name('Updateuser');
Route::get('/delete-user/{id}', [UserController::class, 'DeleteUser'])->name('Deleteuser');

// Wilaya

Route::get('/all-wilaya', [WilayaController::class, 'index'])->name('wilaya.index');
Route::get('/add-wilaya', [WilayaController::class, 'create'])->name('addwilaya');
Route::post('/insert-wilaya', [WilayaController::class, 'store'])->name('wilaya.store');
Route::get('/edit-wilaya/{id}', [WilayaController::class, 'edit'])->name('wilaya.edit');
Route::post('/update-wilaya/{id}', [WilayaController::class, 'update'])->name('wilaya.update');
Route::delete('/delete-wilaya/{id}', [WilayaController::class, 'destroy'])->name('wilaya.destroy');
