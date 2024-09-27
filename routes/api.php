<?php

use App\Http\Controllers\Control\Project\ProjectController;
use App\Http\Controllers\Control\User\LoginController;
use App\Http\Controllers\Control\User\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', [UserController::class, 'profile'])->middleware('auth:sanctum');

Route::middleware(['auth:sanctum'])->group(function() {
  Route::apiResources([
    'project' => ProjectController::class,
  ]);
});

Route::post('/login', [LoginController::class, 'authenticate']);
