<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/**
 * Get an user along with comment by user id
 * Must add id querystring
 */
Route::get('/', [ UserController::class, 'show' ] );

/**
 * Get an user along with comment by user id
 * @param int $id
 */
Route::get('users/{id}', [ UserController::class, 'show' ] );

/**
 * add comments of an user
 */
Route::post('users/comments', [ UserController::class, 'storeComments' ] );