<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\StolenAvtoController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\FilterController;
use App\Http\Controllers\DeleteController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\ExportToExcelController;



use App\Http\Controllers\AutomaticUpdateController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//Auth::routes();

Auth::routes(['verify' => true]);

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/add-to-stolen-avto-base', [StolenAvtoController::class, 'index'])->name('add-to-stolen-avto-base');

Route::post('/send-avto-info', [StolenAvtoController::class, 'infoCar'])->name('send-avto-info');

Route::get('/search', [SearchController::class, 'index'])->name('search');

Route::get('/filter', [FilterController::class, 'index'])->name('filter');

Route::post('/delete', [DeleteController::class, 'delete'])->name('delete');

Route::get('/edit', [EditController::class, 'show'])->name('edit');

Route::post('/save-editted', [EditController::class, 'edit'])->name('save-editted');

Route::get('/export/excel', [ExportToExcelController::class, 'exportToStolenCar'])->name('export.excel');