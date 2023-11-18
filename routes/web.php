<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ExaminationRoomController;
use App\Http\Controllers\ExaminationCommitteeController;
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

Route::get('/candidates',[CandidateController::class,"index"])->name('index');
Route::post('/candidates',[CandidateController::class,"store"])->name('store');
Route::delete('/candidates/{id}',[CandidateController::class,"delete"])->name('delete');
Route::put('/modify_candidates/{id}', [CandidateController::class, 'update'])->name('update');
Route::get('/modify_candidates/{id?}',[CandidateController::class,"modify"])->name('modify');




Route::get('/examination_room',[ExaminationRoomController::class,"index"])->name('index');
Route::post('/examination_room',[ExaminationRoomController::class,"store"])->name('store');
Route::delete('/examination_room/{id}',[ExaminationRoomController::class,"delete"])->name('delete');
Route::put('/modify_room/{id}', [ExaminationRoomController::class, 'update'])->name('update');
Route::get('/modify_room/{id?}',[ExaminationRoomController::class,"modify"])->name('modify');






Route::get('/examination_committees',[ExaminationCommitteeController::class,"index"])->name('index');
Route::post('/examination_committees',[ExaminationCommitteeController::class,"store"])->name('store');
Route::delete('/examination_committees/{id}',[ExaminationCommitteeController::class,"delete"])->name('delete');
Route::put('/modify_committees/{id}', [ExaminationCommitteeController::class, 'update'])->name('update');
Route::get('/modify_committees/{id?}',[ExaminationCommitteeController::class,"modify"])->name('modify');

