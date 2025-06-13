<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\RegisterWeightController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\WeightLogController;
use App\Http\Controllers\TargetWeightController;
use App\Http\Controllers\WeightController;
use Illuminate\Http\Request;

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

Route::get('/register/step1', [RegisterController::class, 'getregister']);
Route::post('/register/step1', [RegisterController::class, 'postregister']);
Route::get('/register/step2', [RegisterWeightController::class, 'getstep2']);
Route::post('/register/step2', [RegisterWeightController::class, 'store']);
Route::get('/login', [LoginController::class, 'getlogin'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::middleware(['auth'])->group(function () {
    Route::get('/weights', [App\Http\Controllers\WeightController::class, 'index']);
});
Route::get('/weight_logs/{weightLogId}/edit', [WeightLogController::class, 'edit'])->name('Weight_logs.edit');
Route::put('/weight_logs/{weightLogId}/update', [WeightLogController::class, 'update'])->name('Weight_logs.update');
Route::delete('/weight_logs/{weightLogId}/delete', [WeightLogController::class, 'destroy']);
Route::get('/weight_logs/goal_setting', [TargetWeightController::class, 'edit']);
Route::post('/weight_logs/goal_setting', [TargetWeightController::class, 'update']);
Route::post('/logout', function (Request $request) {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/login');
})->middleware('auth')->name('logout');