<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\authController;
use App\Http\Controllers\Api\blogController;
use App\Http\Controllers\Api\userController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/register', [authController::class, 'register']);
Route::post('/login', [authController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    
Route::post('/blog', [blogController::class, 'createBlog']);
Route::get('/blog', [blogController::class, 'getAllBlog']);
Route::get('/blog/{id}', [blogController::class, 'getABlog']);
Route::put('/blog/{id}', [blogController::class, 'updateABlog']);
Route::delete('/blog/{id}', [blogController::class, 'deleteABlog']);

 // user profile
 Route::get('/profile', [userController::class, 'profile']);
 Route::post('/logout', [authController::class, 'logout']);
 
});