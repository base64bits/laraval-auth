<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Schema;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use App\Models\User;
use App\Http\Controllers\DashController;

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

// Impersonate Route
Route::impersonate();

// Main routes
Route::middleware(['activity', 'auth:sanctum', 'verified'])->group(function () {
        Route::get('/', function () { return redirect(route("dashboard")); });
        Route::get('/dash', [DashController::class, 'index']);
});

// Logged in user redirect to dashboard
Route::middleware(['activity', 'auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

