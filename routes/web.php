<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentRequestController;
use App\Http\Controllers\AnalysisController;
use App\Http\Controllers\ApologyController;
use App\Http\Controllers\DashboardController;


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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard');
});






Route::controller(ApologyController::class)->group(function () {


    // home for apology
   Route::get('/Apology_home', 'ApologyHome_view');

   //search route 
   Route::get('/cs/search', 'SearchBar');
   Route::get('/apology/search/data', 'getData')->name('apology.data');



    // generate route
    Route::get('/generation_Form', 'FormView')->name('form.view');
    Route::post('/generate', 'generate')->name('apo.generate');
   


});

Route::controller(DashboardController::class)->group(function () {

   Route::get('/dashboard.uploadForm', 'view')->name('uploadForm');

   Route::post('/dashboard.uploadForm', 'upload')->name('upload');

   Route::get('/dashboard.table-APO_all', 'getAllData');


});

Route::controller(AgentRequestController::class)->group(function () {

    Route::get('/dashboard/requests/Pending', 'view_pending')->name('Pending');
    Route::get('/dashboard/requests/Reject', 'view_reject')->name('Reject');
    Route::get('/dashboard/requests/Accepted', 'view_accepted')->name('Accepted');

    Route::post('/reject/{id}', 'reject')->name('reject');
    Route::post('/accept/{id}', 'accept')->name('accept');


    // Route::post('/dashboard.uploadForm', 'upload')->name('upload');
 
   
 
 
 });



 Route::controller(AnalysisController::class)->group(function () {


    Route::get('/dashboard.customise.report', 'channelReport')->name('channelReport');
    Route::get('/dashboard.customise.cr', 'ContactReasonReport')->name('ContactReasonReport');

    Route::get('/dashboard.table-data.inbound', 'inbound_score')->name('inbound_score');
    Route::get('/dashboard.table-data.liveChat', 'liveChat_score')->name('liveChat_score');
    Route::get('/dashboard.table-data.socialMedia', 'socialMedia_score')->name('socialMedia_score');
    Route::get('/dashboard.table-data.IR', 'IR_score')->name('IR_score');
    Route::get('/dashboard.table-data.sales', 'sales_score')->name('sales_score');
    Route::get('/dashboard.table-data.CR', 'CR_score')->name('sales_score');




     
   
 
 
 });
 

Route::get('/{page}', [AdminController::class , 'index']);








