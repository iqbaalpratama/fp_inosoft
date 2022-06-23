<?php

use App\Http\Controllers\InstructionController;
use App\Repositories\AttachmentRepository;
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

Route::get('getall_instruction', [InstructionController::class, 'getAll']);

Route::get('getdetail_instruction/{id}', [InstructionController::class, 'getDetail']);

Route::post('create_instruction', [InstructionController::class, 'store']);

Route::post('cancel-instruction/{id}', [InstructionController::class, 'terminate']);

Route::post('receieve_invoice/{id}', [InstructionController::class, 'receieveInvoice']);

Route::get('get_vendor', [InstructionController::class, 'getVendor']);

Route::post('update_instruction/{id}', [InstructionController::class, 'update']);

Route::post('file', [AttachmentRepository::class, 'createMany']);





