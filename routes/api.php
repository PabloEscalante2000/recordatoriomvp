<?php

use App\Http\Controllers\LoginController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post("login",[LoginController::class, "store"])->name("login");
Route::post("logout", [LoginController::class, "destroy"])->middleware('auth:sanctum')->name("logout");
