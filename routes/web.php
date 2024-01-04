<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RequeteController;
use App\Http\Controllers\MaterielController;
use App\Http\Controllers\SolutionController;
use App\Http\Controllers\RequeteSolutionController;
use App\Http\Controllers\LogicielController;
use App\Http\Controllers\UploadImageController;
use App\Http\Controllers\FaqController;

// use App\Http\Controllers\RegisterController;



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

Route::get('/contactez', function () {
    return view('contactez.index');
})->name('contactez.index');


Route::group(['middleware' => ['guest']], function() {
Route::get('/', function () {
    return view('auth.login');
});
Route::get('/password//reset', function () {
    return view('auth.passwords.reset');
});
});


Auth::routes();


Route::group(['middleware' => ['auth']], function() {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('requetes', RequeteController::class);
    Route::resource('materiels', MaterielController::class);
    // Route::resource('monitors', FaqController::class);
    // Route::get('solutions/{id}/edit/', [SolutionController::class, 'create'])->name('solutions.create');
    Route::resource('solutions', SolutionController::class);
    Route::resource('requetes.solutions', RequeteSolutionController::class);
    Route::resource('logiciels', LogicielController::class);
    Route::resource('faqs', FaqController::class);

    Route::get('upload-image', [UploadImageController::class, 'index']);
    Route::post('save', [UploadImageController::class, 'save']);

});
