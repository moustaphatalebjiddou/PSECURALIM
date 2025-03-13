<?php
use App\Http\Controllers\CooperativerizicoleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\backend\UserController;
use App\Http\Controllers\WilayaController; // Assurez-vous d'utiliser le bon espace de noms
use App\Http\Controllers\IdentificationIrrigueController;
use App\Http\Controllers\MoughataaController;
use App\Http\Controllers\CommuneController;
use App\Http\Controllers\LocaliteController;
use App\Http\Controllers\PerimetreController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ComplementController;
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
Route::get('/wilayas', [WilayaController::class, 'index'])->name('wilayas.index');
Route::get('/wilayas/create', [WilayaController::class, 'create'])->name('wilayas.create');
Route::post('/wilayas', [WilayaController::class, 'store'])->name('wilayas.store');
Route::get('/wilayas/{wilaya}/edit', [WilayaController::class, 'edit'])->name('wilayas.edit');
Route::put('/wilayas/{wilaya}', [WilayaController::class, 'update'])->name('wilayas.update');
Route::delete('/wilayas/{wilaya}', [WilayaController::class, 'destroy'])->name('wilayas.destroy');

//Moughataa

Route::get('/moughataas', [MoughataaController::class, 'index'])->name('moughataas.index');
Route::get('/moughataas/create', [MoughataaController::class, 'create'])->name('moughataas.create');
Route::post('/moughataas', [MoughataaController::class, 'store'])->name('moughataas.store');
Route::get('/moughataas/{moughataa}/edit', [MoughataaController::class, 'edit'])->name('moughataas.edit');
Route::put('/moughataas/{moughataa}', [MoughataaController::class, 'update'])->name('moughataas.update');
Route::delete('/moughataas/{moughataa}', [MoughataaController::class, 'destroy'])->name('moughataas.destroy');

// Communes

Route::get('/communes', [CommuneController::class, 'index'])->name('communes.index');
Route::get('/communes/create', [CommuneController::class, 'create'])->name('communes.create');
Route::post('/communes', [CommuneController::class, 'store'])->name('communes.store');
Route::get('/communes/{commune}/edit', [CommuneController::class, 'edit'])->name('communes.edit');
Route::put('/communes/{commune}', [CommuneController::class, 'update'])->name('communes.update');
Route::delete('/communes/{commune}', [CommuneController::class, 'destroy'])->name('communes.destroy');

// Localites

Route::get('/localites', [LocaliteController::class, 'index'])->name('localites.index');
Route::get('/localites/create', [LocaliteController::class, 'create'])->name('localites.create');
Route::post('/localites', [LocaliteController::class, 'store'])->name('localites.store');
Route::get('/localites/{localite}/edit', [LocaliteController::class, 'edit'])->name('localites.edit');
Route::put('/localites/{localite}', [LocaliteController::class, 'update'])->name('localites.update');
Route::delete('/localites/{localite}', [LocaliteController::class, 'destroy'])->name('localites.destroy');

// Perimetres
Route::get('/perimetres', [PerimetreController::class, 'index'])->name('perimetres.index');
Route::get('/perimetres/create', [PerimetreController::class, 'create'])->name('perimetres.create');
Route::post('/perimetres', [PerimetreController::class, 'store'])->name('perimetres.store');
Route::get('/perimetres/{perimetre}/edit', [PerimetreController::class, 'edit'])->name('perimetres.edit');
Route::put('/perimetres/{perimetre}', [PerimetreController::class, 'update'])->name('perimetres.update');
Route::delete('/perimetres/{perimetre}', [PerimetreController::class, 'destroy'])->name('perimetres.destroy');



// Identification Irrigues


Route::get('identification-irrigues', [IdentificationIrrigueController::class, 'index'])->name('identification_irrigues.index');
Route::get('identification-irrigues/create', [IdentificationIrrigueController::class, 'create'])->name('identification_irrigues.create');
Route::post('identification-irrigues', [IdentificationIrrigueController::class, 'store'])->name('identification_irrigues.store');
Route::get('identification-irrigues/{id}/edit', [IdentificationIrrigueController::class, 'edit'])->name('identification_irrigues.edit');
Route::put('identification-irrigues/{id}', [IdentificationIrrigueController::class, 'update'])->name('identification_irrigues.update');
Route::delete('identification-irrigues/{id}', [IdentificationIrrigueController::class, 'destroy'])->name('identification_irrigues.destroy');

Route::get('moughataas/{wilayaId}', [IdentificationIrrigueController::class, 'getMoughataas']);
Route::get('communes/{moughataaId}', [IdentificationIrrigueController::class, 'getCommunes']);
Route::get('localites/{communeId}', [IdentificationIrrigueController::class, 'getLocalites']);
Route::get('perimetres/{localiteId}', [IdentificationIrrigueController::class, 'getPerimetres']);

Route::get('export_irrigue', [IdentificationIrrigueController::class, 'export']);
Route::get('identification_irrigues/export/pdf', [IdentificationIrrigueController::class, 'exportPdf'])->name('identification_irrigues.export.pdf');
Route::get('print_irrigue/{id}', [IdentificationIrrigueController::class, 'print_irrigue']);
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
Route::get('identification_irrigues/{id}/edit', [IdentificationIrrigueController::class, 'edit'])->name('identification_irrigues.edit');
Route::put('identification_irrigues/{id}', [IdentificationIrrigueController::class, 'update'])->name('identification_irrigues.update');
Route::delete('identification-irrigues/{id}', [IdentificationIrrigueController::class, 'destroy'])->name('identification_irrigues.destroy');

// Complements

Route::get('complement', [ComplementController::class, 'index'])->name('complement.index');
Route::get('complement/create', [ComplementController::class, 'create'])->name('complement.create');
Route::post('complement', [ComplementController::class, 'store'])->name('complement.store');
Route::get('complement/{id}/edit', [ComplementController::class, 'edit'])->name('complement.edit');
Route::put('complement/{id}', [ComplementController::class, 'update'])->name('complement.update');
Route::delete('complement/{id}', [ComplementController::class, 'destroy'])->name('complement.destroy');

Route::get('moughataas/{wilayaId}', [ComplementController::class, 'getMoughataas']);
Route::get('communes/{moughataaId}', [ComplementController::class, 'getCommunes']);
Route::get('localites/{communeId}', [ComplementController::class, 'getLocalites']);
Route::get('perimetres/{localiteId}', [ComplementController::class, 'getPerimetres']);

Route::get('export_complement', [ComplementController::class, 'export']);
Route::get('complement/export/pdf', [ComplementController::class, 'exportPdf'])->name('complement.export.pdf');
Route::get('print_complement/{id}', [ComplementController::class, 'print_complement']);
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
Route::get('complement/{id}/edit', [ComplementController::class, 'edit'])->name('complement.edit');
Route::put('complement/{id}', [ComplementController::class, 'update'])->name('complement.update');
Route::delete('complement/{id}', [ComplementController::class, 'destroy'])->name('complement.destroy');

// Cooperatives

Route::get('cooperativerizicole', [CooperativerizicoleController::class, 'index'])->name('cooperativerizicole.index'); 
Route::get('cooperativerizicole/create', [CooperativerizicoleController::class, 'create'])->name('cooperativerizicole.create');
Route::post('cooperativerizicole', [CooperativerizicoleController::class, 'store'])->name('cooperativerizicole.store');
Route::get('cooperativerizicole/{id}/edit', [CooperativerizicoleController::class, 'edit'])->name('cooperativerizicole.edit');
Route::put('cooperativerizicole/{id}', [CooperativerizicoleController::class, 'update'])->name('cooperativerizicole.update');
Route::delete('cooperativerizicole/{id}', [CooperativerizicoleController::class, 'destroy'])->name('cooperativerizicole.destroy');

Route::get('moughataas/{wilayaId}', [CooperativerizicoleController::class, 'getMoughataas']);
Route::get('communes/{moughataaId}', [CooperativerizicoleController::class, 'getCommunes']);
Route::get('localites/{communeId}', [CooperativerizicoleController::class, 'getLocalites']);
Route::get('perimetres/{localiteId}', [CooperativerizicoleController::class, 'getPerimetres']);

Route::get('export_cooperativerizicole', [CooperativerizicoleController::class, 'export']);
Route::post('import_cooperativerizicole', [CooperativerizicoleController::class, 'import']);
Route::get('cooperativerizicole/export/pdf', [CooperativerizicoleController::class, 'exportPdf'])->name('cooperativerizicole.export.pdf');
Route::get('print_cooperativerizicole/{id}', [CooperativerizicoleController::class, 'print_cooperativerizicole']);
Route::get('/home', [DashboardController::class, 'index'])->name('dashboard');
Route::get('cooperativerizicole/{id}/edit', [CooperativerizicoleController::class, 'edit'])->name('cooperativerizicole.edit');
Route::put('cooperativerizicole/{id}', [CooperativerizicoleController::class, 'update'])->name('cooperativerizicole.update');
Route::delete('cooperativerizicole/{id}', [CooperativerizicoleController::class, 'destroy'])->name('cooperativerizicole.destroy');
