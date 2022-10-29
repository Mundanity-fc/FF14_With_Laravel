<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PriceSearch extends Controller
{

    function getPrice($item, $count, $server)
    {
        $searchCondition = '?columns=Icon';
        $target = Item::where('name_cn', '=', $item)->first();
        if (is_null($target)) {
            $target = Item::where('name_en', '=', $item)->first();
        }
        if (is_null($target)) {
            $target = Item::where('name_jp', '=', $item)->first();
        }
        if (is_null($target)) {
            return response()->json($target, 200, [], \JSON_PRETTY_PRINT);
        }
        $response = Http::get('https://xivapi.com' . '/item/' . $target->id . $searchCondition);
        $data = json_decode($response->body());
        $target->fill([
            'icon' => 'https://xivapi.com' . $data->Icon
        ]);
        $response = Http::get('https://universalis.app/api/v2/' . $server . '/' . $target->id . '?listings=' . $count . '&entries=' . $count);
        $data = json_decode($response->body());
        $target->fill([
            'price_info' => $data
        ]);
        return response()->json($target, 200, [], \JSON_PRETTY_PRINT);
    }
}
