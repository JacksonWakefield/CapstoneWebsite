<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ShowcaseCrud;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/survey', [ShowcaseCrud::class, 'surveyIndex']);
Route::post('/add', [ShowcaseCrud::class,'add']);

Route::get('/showcase', [ShowcaseCrud::class,'showcaseIndex']);
Route::post('/get', [ShowcaseCrud::class,'get']);

Route::get('/seminars', function () {
    return view('welcome');
});

