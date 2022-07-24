<?php

use App\Http\Controllers\ApplicationController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

/*
|--------------------------------------------------------------------------
Role CRUD
|--------------------------------------------------------------------------
*/
// Get All
Route::get("/roles", [RoleController::class, "index"]);
// Get by Id
Route::get("/roles/{id}", [RoleController::class, "show"]);
// create
Route::post("/roles/create", [RoleController::class, "store"]);
// update
Route::put('/roles/{id}', [RoleController::class, "update"]);
// delete
Route::delete('/roles/{id}', [RoleController::class, "destroy"]);

/*
|--------------------------------------------------------------------------
User CRUD
|--------------------------------------------------------------------------
*/
// Get All
Route::get("/users", [UserController::class, "index"]);
// Get by Id
Route::get("/users/{id}", [UserController::class, "show"]);
// create
Route::post("/users/create", [UserController::class, "store"]);
// update
Route::put('/users/{id}', [UserController::class, "update"]);
// delete
Route::delete('/users/{id}', [UserController::class, "destroy"]);

/*
|--------------------------------------------------------------------------
Application CRUD
|--------------------------------------------------------------------------
*/
// Get All
Route::get("/applications", [ApplicationController::class, "index"]);
// Get by Id
Route::get("/applications/{id}", [ApplicationController::class, "show"]);
// create
Route::post("/applications/create", [ApplicationController::class, "store"]);
// update
Route::put('/applications/{id}', [ApplicationController::class, "update"]);
// delete
Route::delete('/applications/{id}', [ApplicationController::class, "destroy"]);
