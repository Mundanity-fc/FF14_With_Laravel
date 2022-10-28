<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PriceSearch;
use App\Http\Controllers\QuestSearch;


Route::get('/test', [PriceSearch::class, 'ReturnTest']);
Route::get('/quest/{QuestID}', [QuestSearch::class, 'GetInfoByID']);
Route::get('/questByName/{Name}', [QuestSearch::class, 'GetInfoByName']);
