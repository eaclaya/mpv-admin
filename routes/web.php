<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(["middleware" => ["auth", "verified"]], function () {
    Route::view("/", "dashboard")
        ->middleware(["auth", "verified"])
        ->name("dashboard");

    Route::resource("clients", ClientController::class);
    Route::resource("users", UserController::class);

    Route::post("/users/{id}/token", [
        UserController::class,
        "createToken",
    ])->name("users.token");

    Route::view("profile", "profile")
        ->middleware(["auth"])
        ->name("profile");
});

require __DIR__ . "/auth.php";
