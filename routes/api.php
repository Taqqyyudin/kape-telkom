<?php

use App\Http\Controllers\NodesController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/node', 'NodesController@index');
Route::post('/node', 'NodesController@create');
Route::put('/node/{hostname}', 'NodesController@update');
Route::delete('/node/{hostname}', 'NodesController@delete');

Route::get('/node/export_excel', 'NodesController@export_excel');
Route::post('/node/import_excel', 'NodesController@import_excel');
