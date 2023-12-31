<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ExaminationRoomController;
use App\Http\Controllers\ExaminationCommitteeController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\authController;
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

Route::middleware(['auth'])->group(function () {
    
Route::get('/distribution',[DistributionController::class,"index"])->name('index_D');
Route::get('/',[DistributionController::class,"master"])->name('master');
Route::post('/',[DistributionController::class,"autoAssignRoomsAndCommittees"])->name('distribution');
Route::get('/d', [DistributionController::class, 'deleteDistribution'])->name('delete_D');


Route::get('/candidates',[CandidateController::class,"index"])->name('index_C');
Route::post('/candidates',[CandidateController::class,"store"])->name('store_C');
Route::delete('/candidates/{id}',[CandidateController::class,"delete"])->name('delete_C');
Route::put('/modify_candidates/{id}', [CandidateController::class, 'update'])->name('update_C');
Route::get('/modify_candidates/{id?}',[CandidateController::class,"modify"])->name('modify_C');




Route::get('/examination_room',[ExaminationRoomController::class,"index"])->name('index_R');
Route::post('/examination_room',[ExaminationRoomController::class,"store"])->name('store_R');
Route::delete('/examination_room/{id}',[ExaminationRoomController::class,"delete"])->name('delete_R');
Route::put('/modify_room/{id}', [ExaminationRoomController::class, 'update'])->name('update_R');
Route::get('/modify_room/{id?}',[ExaminationRoomController::class,"modify"])->name('modify_R');






Route::get('/examination_committees',[ExaminationCommitteeController::class,"index"])->name('index');
Route::post('/examination_committees',[ExaminationCommitteeController::class,"store"])->name('store');
Route::delete('/examination_committees/{id}',[ExaminationCommitteeController::class,"delete"])->name('delete');
Route::put('/modify_committees/{id}', [ExaminationCommitteeController::class, 'update'])->name('update');
Route::get('/modify_committees/{id?}',[ExaminationCommitteeController::class,"modify"])->name('modify');


Route::get('/logout',[authController::class,"logout"])->name('logout');

});

Route::middleware(['guest'])->group(function () {

    Route::get('/login',[authController::class,"show_login"])->name('show_login');
    Route::post('/login',[authController::class,"login"])->name('login');
    Route::get('/register',[authController::class,"show_register"])->name('show_register');
    Route::post('/register',[authController::class,"register"])->name('register');
});



