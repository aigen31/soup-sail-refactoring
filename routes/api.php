<?php

use App\Http\Controllers\Control\Project\ProjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');

Route::apiResources([
	'project' => ProjectController::class
]);
