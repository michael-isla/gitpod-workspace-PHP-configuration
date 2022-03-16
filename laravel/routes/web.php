<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});
// Route for contactview
Route::get('/contactview','App\Http\Controllers\Contact\ContactControllerUI@viewform'); 

//Route for getting the data
Route::get('/contactview','App\Http\Controllers\Contact\ContactControllerUI@index');

// Route for addContact
Route::get('/addContact','App\Http\Controllers\Contact\ContactControllerUI@contactform');

// save data
Route::post('/add_data','App\Http\Controllers\Contact\ContactControllerUI@contactSave');

//route to the edit view
Route::get('click_edit/{id}','App\Http\Controllers\Contact\ContactControllerUI@contactEdit');

//udpate 
Route::post('/update/{id}','App\Http\Controllers\Contact\ContactControllerUI@contactUpdate');

// Delete
Route::get('/click_delete/{id}','App\Http\Controllers\Contact\ContactControllerUI@contactDelete');