<?php

use App\Http\Controllers\CollectionController;
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

Route::get('getEmployeeName', [CollectionController::class, 'test_get_employees_names']);
Route::get('test_get_the_year_from_each_date', [CollectionController::class, 'test_get_the_year_from_each_date']);
Route::get('get_the_part_time_employees', [CollectionController::class, 'get_the_part_time_employees']);
Route::get('priceIncets', [CollectionController::class, 'priceIncets']);
Route::get('test_get_products_in_stock', [CollectionController::class, 'test_get_products_in_stock']);
Route::get('test_get_cities_with_more_than_120_000_people', [CollectionController::class, 'test_get_cities_with_more_than_120_000_people']);
