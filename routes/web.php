<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PassagerController;
use App\Http\Controllers\RegisterController;
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
    return view('login');
});




Route::get('/PaRegister', function () {
    return view('PassagerRegister');
});
Route::get('/ChauRegister', function () {
    return view('ChauffeurRegister');
});
Route::middleware(['auth', 'role:chauffeur'])->group(function () {
    Route::get('/chauffeur', function () {
        return view('chauffeur');
    });
});
Route::middleware(['auth', 'role:passager'])->group(function () {
    Route::get('/passager', function () {
        return view('passager');
    });
});
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin');
    });
});
Route::post('/passenger', [RegisterController::class, 'store']);
Route::post('/login', [LoginController::class, 'login']);
