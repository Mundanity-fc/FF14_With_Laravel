<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class QuestSearch extends Controller
{

    function GetInfo($QuestID = '0'){
        $response = Http::get('https://xivapi.com'.'/quest/'.$QuestID);
        $data = $response->body();
        $data = json_decode($data);
        if(is_string($data))
            return print('yes');

        return print(phpinfo());
//        return var_dump($data);
//        return print($data);
//        return response()->json([
//            $data,
//        ])->setEncodingOptions(JSON_PRETTY_PRINT);
    }

    function GetQuestList(){

    }
}
