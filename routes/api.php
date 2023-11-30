<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserManagementController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


// Route::get('/tags-management/tags-option-list', [TalentController::class, 'results']);
Route::post('/user-management/users/sign-in', [LoginController::class, 'authenticate'])->withoutMiddleware(['web']);

Route::post('/user-management/users/register', [UserManagementController::class, 'register']);