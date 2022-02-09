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

Route::get('/declarations', function () {
    return response()->json(\App\Models\Declaration::query()->orderBy('time', 'desc')->get([
        'id',
        'first_name',
        'second_name',
        'address',
        'contact_number',
        'temp',
        '1',
        '2',
        '3',
        '4',
        'time',
    ]));
});
