<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/token',function(){
    echo csrf_token(); 
});

Route::post('/echo', function (Request $request) {
    // Retrieve data from the request

    // Echo the request data
    echo json_encode(array("output" => ["3","5"]));
});
