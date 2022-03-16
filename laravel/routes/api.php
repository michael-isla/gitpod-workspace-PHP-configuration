<?php

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
//Get all data 
Route::get('contact', 'App\Http\Controllers\Contact\ContactControllerAPI@contact'); 
//Get data BY id 
Route::get('contact/{id}', 'App\Http\Controllers\Contact\ContactControllerAPI@contactByID');
//POST data 
Route::post('contact', 'App\Http\Controllers\Contact\ContactControllerAPI@contactSave');
//PUT data     
Route::put('contact/{contact}', 'App\Http\Controllers\Contact\ContactControllerAPI@contactUpdate');
//DELETE data
Route::delete('contact/{contact}', 'App\Http\Controllers\Contact\ContactControllerAPI@contactDelete');