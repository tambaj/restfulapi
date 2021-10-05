<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PostsApiController;
use App\Http\Controllers\MovementController;
use App\Http\Controllers\MoveEmploController;

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
Route::get('/movements',);
// login
Route::post('/login', 'LoginController@login');

Route::get('/posts', [PostsApiController::class, 'index']);
Route::post('/posts', [PostsApiController::class, 'store']);
Route::put('/posts/{post}', [PostsApiController::class, 'update']);
Route::delete('/posts/{post}', [PostsApiController::class, 'destroy']);

    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::post('/employees', [EmployeeController::class, 'store']);
    Route::get('/employees/{id}', [EmployeeController::class, 'edit']);
    Route::put('/employees/{id}', [EmployeeController::class, 'update']);
    Route::delete('/employees/{id}', [EmployeeController::class, 'destroy']);

    Route::get('/movements', [MovementController::class, 'index']);
    Route::get('/movements/{id}', [MovementController::class, 'edit']);
    Route::post('/movements', [MovementController::class, 'store']);
    Route::put('/movements/{id}', [MovementController::class, 'update']);
    Route::delete('/movements/{movement}', [MovementController::class, 'destroy']);

    Route::get('/movemplos', [MoveEmploController::class, 'index']);
    Route::post('/movemplos', 'MoveEmploController@store');
    Route::put('/movemplos/{id}', [MoveEmploController::class, 'update']);
    Route::delete('/movemplos/{id}', [MoveEmploController::class, 'destroy']);

