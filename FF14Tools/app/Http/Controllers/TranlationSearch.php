<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Item;
use App\Models\Quest;
use Illuminate\Http\Request;

class TranlationSearch extends Controller
{
    function getTranslate($type, $name)
    {
        $target = null;
        if ($type === "任务") {
            $target = Quest::where('name_cn', '=', $name)->first();
            if (is_null($target)) {
                $target = Quest::where('name_en', '=', $name)->first();
            }
            if (is_null($target)) {
                $target = Quest::where('name_jp', '=', $name)->first();
            }
            if (is_null($target)) {
                return response()->json($target, 200, [], \JSON_PRETTY_PRINT);
            }
        }
        if ($type === "技能") {
            $target = Action::where('name_cn', '=', $name)->first();
            if (is_null($target)) {
                $target = Action::where('name_en', '=', $name)->first();
            }
            if (is_null($target)) {
                $target = Action::where('name_jp', '=', $name)->first();
            }
            if (is_null($target)) {
                return response()->json($target, 200, [], \JSON_PRETTY_PRINT);
            }
        }
        if ($type === "道具") {
            $target = Item::where('name_cn', '=', $name)->first();
            if (is_null($target)) {
                $target = Item::where('name_en', '=', $name)->first();
            }
            if (is_null($target)) {
                $target = Item::where('name_jp', '=', $name)->first();
            }
            if (is_null($target)) {
                return response()->json($target, 200, [], \JSON_PRETTY_PRINT);
            }
        }
        return response()->json($target, 200, [], \JSON_PRETTY_PRINT);
    }
}
