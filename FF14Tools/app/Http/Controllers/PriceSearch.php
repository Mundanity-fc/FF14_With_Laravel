<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PriceSearch extends Controller
{

    static function ReturnTest(){
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
            'test' => [
                't1' => 23,
                't2' => 33,
                't3' => [
                    23,13,11
                ]
            ]
        ])->setEncodingOptions(JSON_PRETTY_PRINT);
    }
}
