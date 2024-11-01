<?php

use App\Http\Controllers\Control\Project\ProjectController;
use App\Http\Controllers\Control\Project\ProjectDelegatedController;
use App\Http\Controllers\Control\Project\ProjectTargetController;
use App\Http\Controllers\Control\User\LoginController;
use App\Http\Controllers\Control\User\UserController;
use Illuminate\Support\Facades\Route;

Route::post('/login', [LoginController::class, 'authenticate']);

Route::middleware(['auth:sanctum'])->group(function () {
  // Route::get('/user', [UserController::class, 'profile']);

  Route::get('/project/current', [ProjectController::class, 'index']);
  Route::get('/project/target', [ProjectTargetController::class, 'index']);
  Route::get('/project/delegate', [ProjectDelegatedController::class, 'index']);
  Route::get('/project/{projectId}', [ProjectController::class, 'show']);
  Route::get('/project/delegate/{projectId}', [ProjectDelegatedController::class, 'show']);
  Route::post('/project/target', [ProjectTargetController::class, 'store']);
  Route::post('/project/current', [ProjectController::class, 'store']);
  Route::delete('/project/{projectId}', [ProjectController::class, 'destroy']);
  Route::put('/project/target/{projectId}', [ProjectTargetController::class, 'update']);
  Route::put('/project/{projectId}/status', [ProjectTargetController::class, 'setStatus']);
  Route::put('/project/current/{projectId}', [ProjectController::class, 'update']);
  Route::put('/project/delegate/{projectId}', [ProjectDelegatedController::class, 'update']);
});
