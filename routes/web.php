<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ChauffeurController;
use App\Http\Middleware\RedirectIfAuthenticated;

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
    return view('login');
})->middleware(RedirectIfAuthenticated::class);



//voir le role qui peux acess a c'est page seulment

Route::middleware(['auth', 'role:chauffeur'])->group(function () {
    Route::get('/chauffeur', function () {
        return view('drivers/chauffeur');
    });
    // Route::get('/DriverProfil', function () {
    //     return view('drivers/ChauffeurProfil');
    // });

    Route::get('/DriverProfil', [ChauffeurController::class, 'showUserProfile'])->name('driver.profile');

});
//voir le role qui peux acess a c'est page seulment

Route::middleware(['auth', 'role:passager'])->group(function () {
    Route::get('/passager', function () {
        return view('passengers/passager');
    });
});
//voir le role qui peux acess a c'est page seulment

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin/admin');
    });
});
//voir si il sont connecter pour ce enregistrer

Route::get('/PaRegister', function () {
    return view('passengers/PassagerRegister');
})->middleware(RedirectIfAuthenticated::class);

Route::get('/ChauRegister', function () {
    return view('drivers/ChauffeurRegister');
})->middleware(RedirectIfAuthenticated::class);

//voir si il sont connecter pour realiser cette functionaliter
Route::post('/passenger', [RegisterController::class, 'store'])->middleware(RedirectIfAuthenticated::class);

Route::post('/login', [LoginController::class, 'login'])->middleware(RedirectIfAuthenticated::class);
Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
    Route::post('/availibality', [ChauffeurController::class, 'availibality']);
    Route::post('/trip', [ChauffeurController::class, 'trip']);
});
