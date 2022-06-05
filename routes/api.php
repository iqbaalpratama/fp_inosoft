<?php

use App\Http\Controllers\InstructionController;
use App\Repositories\InstructionRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('instruction', [InstructionController::class, 'getAll']);

Route::get('instruction/{id}', [InstructionController::class, 'getDetail']);

Route::post('instruction', [InstructionController::class, 'store']);

Route::put('instruction/{id}', [InstructionController::class, 'update']);

Route::get('instruction-test', [InstructionRepository::class, 'getCompleted']);



