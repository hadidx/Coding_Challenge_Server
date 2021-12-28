<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});*/
    Route::post('register', [AuthController::class, 'registerUser']);




    Route::group(['middleware'=> ['auth:api']] , function()
    {
        //All the routes that belongs to the group goes here
        Route::post('login', [AuthController::class, 'login']);
        Route::get('user', [AuthController::class, 'user']);
        Route::get('logout', [AuthController::class, 'logout']);
    });

    Route::group(['middleware'=> ['auth:api', 'adminAuth']] , function()
    {
        //All the routes that belongs to the group goes here
        Route::get('customers/{records?}', [CustomerController::class, 'get']);
    });

    // Route::get('customers/{records?}', [AdminController::class, 'getCustomersList']);
