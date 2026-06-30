<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

Route::post("login",[LoginController::class, "store"])->name("login");
Route::delete("logout", [LoginController::class, "destroy"])->middleware('auth:sanctum')->name("logout");