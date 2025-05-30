<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(["prefix" => "users"], function() {
    Route::get("/", [UserController::class, "index"]);
    Route::get("/{id}", [UserController::class, "show"]);
    Route::post("/", [UserController::class, "store"]);
    Route::patch("/{id}", [UserController::class, "update"]);
    Route::delete("/{id}", [UserController::class, "destroy"]);
});

Route::group(["prefix" => "posts"], function() {
    Route::get("/", [PostController::class, "index"]);
    Route::get("/{id}", [PostController::class, "show"]);
    Route::post("/", [PostController::class, "store"]);
    Route::patch("/{id}", [PostController::class, "update"]);
    Route::delete("/{id}", [PostController::class, "destroy"]);
});