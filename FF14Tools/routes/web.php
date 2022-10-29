<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriceSearch;
use App\Http\Controllers\QuestSearch;
use App\Http\Controllers\TranlationSearch;
use App\Http\Controllers\UserController;


Route::get('/quest/{QuestID}', [QuestSearch::class, 'GetInfoByID']);
Route::get('/questByName/{Name}', [QuestSearch::class, 'GetInfoByName']);
Route::get('/price/{item},{count},{server}', [PriceSearch::class, 'getPrice']);
Route::get('/translate/{type},{name}', [TranlationSearch::class, 'getTranslate']);
