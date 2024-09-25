<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ClientController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::post("/auth/login", [AuthController::class, 'login']);

Route::group(['middleware' => 'auth:sanctum'], function (){
        Route::get("/auth/user", [AuthController::class, 'user']);

        Route::get("/clients/check", [ClientController::class, "clientCheck"]);


});


