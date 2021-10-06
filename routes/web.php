<?php

use App\Http\Controllers\user\homeController;
use App\Http\Controllers\user\singlePostController;
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

// Route::get('/', function () {
//     return view('layouts.user.userdashboard');
// });
Route::get('/', [homeController::class, 'index']);
Route::get('/category/{id}', [homeController::class, 'categorywise'])->name('post.category');
Route::get('/search', [homeController::class, 'search'])->name('search');
Route::get('/singlepost/{id}', [singlePostController::class, 'index'])->name('post.single');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/{vue_capture?}', function () {
        return view('layouts.admin.adminDashboard');
    })->where('vue_capture', '[\/\w\.-]*');
});
