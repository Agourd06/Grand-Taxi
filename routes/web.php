<?php

use App\Http\Controllers\adminController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PassagerController;
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



//---------------------------route of drivers only ----------------------------------

Route::middleware(['auth', 'role:chauffeur'])->group(function () {



    Route::get('/DriverProfil', [ChauffeurController::class, 'showUserProfile'])->name('driver.profile');
    Route::get('/chauffeur', [ChauffeurController::class, 'Disponibility'])->name('driver');
    Route::post('/availibality', [ChauffeurController::class, 'availibality']);
    Route::get('/ChHistory', [ChauffeurController::class, 'ShowReHistory']);
    Route::post('/trip', [ChauffeurController::class, 'trip']);
    Route::post('/DeletHistoriqueDriver', [ChauffeurController::class, 'DeletHistorique']);

});

//--------------------------- end route of drivers only ----------------------------------






//---------------------------route of passenger only ----------------------------------

Route::middleware(['auth', 'role:passager'])->group(function () {


    Route::get('/favoritTrip', [PassagerController::class, 'favoritRoads']);
    Route::get('/profilPassager', [PassagerController::class, 'showUserProfile']);
    Route::get('/PaReservation', [PassagerController::class, 'PaReservation']);
    Route::post('/DeletHistorique', [PassagerController::class, 'DeletHistorique']);
    Route::post('/DeleteReservation', [PassagerController::class, 'DeleteReservation']);

    Route::get('/PaHistory', [PassagerController::class, 'showPaHistory']);
    Route::post('/favorit', [PassagerController::class, 'favorit']);
    Route::post('/noter', [PassagerController::class, 'noter']);
    // tout les drivers
    Route::get('/passager', [PassagerController::class, 'DriversPassanger']);
    // filtrage page driver
    Route::post('/filter', [PassagerController::class, 'DriversPassanger']);
    // reserver un trajet par driver
    Route::match(['get', 'post'], '/confirmeResrvation', [PassagerController::class, 'confirmeResrvations']);
    Route::match(['get', 'post'], '/reserveration', [PassagerController::class, 'Resevationdata'])->name('reserve.post');
});

//--------------------------- end route of passenger only ----------------------------------





//---------------------------route of admin only ----------------------------------

Route::middleware(['auth', 'role:admin'])->group(function () {

    route::get('/admin', [adminController::class, 'AdminDashboard']);
    route::get('/AdminUsers', [adminController::class, 'AdminUsers']);
    route::post('/archive', [adminController::class, 'archive']);
    route::post('/archiveUser', [adminController::class, 'archiveUser']);
});


//--------------------------- end route of admin only ----------------------------------



//voir si il sont connecter pour ce enregistrer




//v------------------------------sing in / sing up ---------------------------------------------

Route::post('/register', [RegisterController::class, 'store'])->middleware(RedirectIfAuthenticated::class);


Route::get('/ChauRegister', function () {
    return view('drivers/ChauffeurRegister');
})->middleware(RedirectIfAuthenticated::class);


Route::get('/PaRegister', function () {
    return view('passengers/PassagerRegister');
})->middleware(RedirectIfAuthenticated::class);

Route::post('/login', [LoginController::class, 'login'])->middleware(RedirectIfAuthenticated::class);

Route::middleware(['auth'])->group(function () {
    Route::get('/logout', [LoginController::class, 'logout']);
  
});
