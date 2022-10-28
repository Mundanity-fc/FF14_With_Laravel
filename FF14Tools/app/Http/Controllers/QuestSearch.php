<?php

namespace App\Http\Controllers;

use App\Models\Action;
use App\Models\Item;
use App\Models\Npc;
use App\Models\Place;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Quest;
use Illuminate\Support\Facades\DB;

class QuestSearch extends Controller
{
    function GetInfoByID($QuestID){
        $searchCondition = str_replace(array("\r", "\n", " "), "", $this->searchCondition);
        $quest = Quest::find($QuestID);
        $response = Http::get('https://xivapi.com'.'/quest/'.$QuestID.$searchCondition);
        $data = $response->body();
        $data1 = json_decode($data);
        $quest = $this->combineData($quest, $data1);
        return response()->json($quest, 200, [], \JSON_PRETTY_PRINT);
    }

    function GetInfoByName($Name){
        $quest = Quest::where('name_cn', '=', $Name)->first();
        if(is_null($quest)){
            $quest = Quest::where('name_en', '=', $Name)->first();
        }
        if(is_null($quest)){
            $quest = Quest::where('name_jp', '=', $Name)->first();
        }
        if(is_null($quest)){
            return print('null');
        }
        $id = $quest->id;
        $searchCondition = str_replace(array("\r", "\n", " "), "", $this->searchCondition);
        $response = Http::get('https://xivapi.com'.'/quest/'.$id.$searchCondition);
        $data = $response->body();
        $data1 = json_decode($data);
        $quest = $this->combineData($quest, $data1);
        return response()->json($quest, 200, [], \JSON_PRETTY_PRINT);
    }

    function combineData($quest, $jsonData){
        $data = $quest;
        $item_reward = [];
        $option_reward = [];
        $action_reward = '';
        $place = '';
        $start_npc = '';
        $end_npc = '';
        $job = '';
        $category = '';
        $genre = '';
        if($jsonData->ItemCountReward0 != 0)
        {
            $item0 = Item::find($jsonData->ItemReward0->ID);
            $item0->fill([
                'icon' => 'https://xivapi.com'.$jsonData->ItemReward0->Icon,
                'count' => $jsonData->ItemCountReward0
            ]);
            $item_reward[] = $item0;
        }
        if($jsonData->ItemCountReward1 != 0)
        {
            $item1 = Item::find($jsonData->ItemReward1->ID);
            $item1->fill([
                'icon' => 'https://xivapi.com'.$jsonData->ItemReward1->Icon,
                'count' => $jsonData->ItemCountReward1
            ]);
            $item_reward[] = $item1;
        }
        if($jsonData->ItemCountReward2 != 0)
        {
            $item2 = Item::find($jsonData->ItemReward2->ID);
            $item2->fill([
                'icon' => 'https://xivapi.com'.$jsonData->ItemReward2->Icon,
                'count' => $jsonData->ItemCountReward2
            ]);
            $item_reward[] = $item2;
        }
        if($jsonData->ItemCountReward3 != 0)
        {
            $item3 = Item::find($jsonData->ItemReward3->ID);
            $item3->fill([
                'icon' => 'https://xivapi.com'.$jsonData->ItemReward3->Icon,
                'count' => $jsonData->ItemCountReward3
            ]);
            $item_reward[] = $item3;
        }
        if($jsonData->ItemCountReward4 != 0)
        {
            $item4 = Item::find($jsonData->ItemReward4->ID);
            $item4->fill([
                'icon' => 'https://xivapi.com'.$jsonData->ItemReward4->Icon,
                'count' => $jsonData->ItemCountReward4
            ]);
            $item_reward[] = $item4;
        }
        if($jsonData->ItemCountReward5 != 0)
        {
            $item5 = Item::find($jsonData->ItemReward5->ID);
            $item5->fill([
                'icon' => 'https://xivapi.com'.$jsonData->ItemReward5->Icon,
                'count' => $jsonData->ItemCountReward5
            ]);
            $item_reward[] = $item5;
        }
        if($jsonData->ItemCountReward6 != 0)
        {
            $item6 = Item::find($jsonData->ItemReward6->ID);
            $item6->fill([
                'icon' => 'https://xivapi.com'.$jsonData->ItemReward6->Icon,
                'count' => $jsonData->ItemCountReward6
            ]);
            $item_reward[] = $item6;
        }

        if($jsonData->OptionalItemCountReward0 != 0)
        {
            $option_item0 = Item::find($jsonData->OptionalItemReward0->ID);
            $option_item0->fill([
                'icon' => 'https://xivapi.com'.$jsonData->OptionalItemReward0->Icon,
                'count' => $jsonData->OptionalItemCountReward0
            ]);
            $option_reward[] = $option_item0;
        }
        if($jsonData->OptionalItemCountReward1 != 0)
        {
            $option_item1 = Item::find($jsonData->OptionalItemReward1->ID);
            $option_item1->fill([
                'icon' => 'https://xivapi.com'.$jsonData->OptionalItemReward1->Icon,
                'count' => $jsonData->OptionalItemCountReward1
            ]);
            $option_reward[] = $option_item1;
        }
        if($jsonData->OptionalItemCountReward2 != 0)
        {
            $option_item2 = Item::find($jsonData->OptionalItemReward2->ID);
            $option_item2->fill([
                'icon' => 'https://xivapi.com'.$jsonData->OptionalItemReward2->Icon,
                'count' => $jsonData->OptionalItemCountReward2
            ]);
            $option_reward[] = $option_item2;
        }
        if($jsonData->OptionalItemCountReward3 != 0)
        {
            $option_item3 = Item::find($jsonData->OptionalItemReward3->ID);
            $option_item3->fill([
                'icon' => 'https://xivapi.com'.$jsonData->OptionalItemReward3->Icon,
                'count' => $jsonData->OptionalItemCountReward3
            ]);
            $option_reward[] = $option_item3;
        }
        if($jsonData->OptionalItemCountReward4 != 0)
        {
            $option_item4 = Item::find($jsonData->OptionalItemReward4->ID);
            $option_item4->fill([
                'icon' => 'https://xivapi.com'.$jsonData->OptionalItemReward4->Icon,
                'count' => $jsonData->OptionalItemCountReward4
            ]);
            $option_reward[] = $option_item4;
        }

        if ($jsonData->ActionReward->ID != null){
            $action_reward = Action::find($jsonData->ActionReward->ID);
            $action_reward->fill([
                'icon' => 'https://xivapi.com'.$jsonData->ActionReward->IconHD
            ]);
        }


        if($jsonData->PlaceName->ID != null){
            $place = Place::find($jsonData->PlaceName->ID);
        }

        if($jsonData->IssuerStart->ID != null){
            $start_npc = Npc::find($jsonData->IssuerStart->ID);
        }
        if($jsonData->TargetEnd->ID != null){
            $end_npc = Npc::find($jsonData->TargetEnd->ID);
        }

        $jobsql = "select * from \"ClassJobCategory\" where \"id\" = ".$jsonData->ClassJobCategory0->ID;
        $job = DB::select($jobsql)[0];
        $categorysql = "select * from \"JournalCategory\" where \"id\" = ".$jsonData->JournalGenre->JournalCategory->ID;
        $category = DB::select($categorysql)[0];
        $genreql = "select * from \"JournalGenre\" where \"id\" = ".$jsonData->JournalGenre->ID;
        $genre = DB::select($genreql)[0];
        $data->fill(
            [
                'icon' => 'https://xivapi.com'.$jsonData->Icon,
                'banner' => 'https://xivapi.com'.$jsonData->IconHD,
                'gil_reward' => $jsonData->GilReward,
                'exp_reward' => $jsonData->ExperiencePoints,
                'item_reward' => $item_reward,
                'option_reward' => $option_reward,
                'action_reward' => $action_reward,
                'start_place' => $place,
                'start_npc' => $start_npc,
                'end_npc' => $end_npc,
                'job' => $job,
                'category' => $category,
                'genre' => $genre,
            ]
        );
        return $data;
    }

    function GetQuestList(){

    }

    protected $searchCondition = "?columns=ID,
        IconHD,
        PlaceName.ID,
        GilReward,
        ExperiencePoints,
        ItemCountReward0,
        ItemCountReward1,
        ItemCountReward2,
        ItemCountReward3,
        ItemCountReward4,
        ItemCountReward5,
        ItemCountReward6,
        ItemReward0.ID,
        ItemReward0.Icon,
        ItemReward1.ID,
        ItemReward1.Icon,
        ItemReward2.ID,
        ItemReward2.Icon,
        ItemReward3.ID,
        ItemReward3.Icon,
        ItemReward4.ID,
        ItemReward4.Icon,
        ItemReward5.ID,
        ItemReward5.Icon,
        ItemReward6.ID,
        ItemReward6.Icon,
        OptionalItemCountReward0,
        OptionalItemCountReward1,
        OptionalItemCountReward2,
        OptionalItemCountReward3,
        OptionalItemCountReward4,
        OptionalItemReward0.ID,
        OptionalItemReward0.Icon,
        OptionalItemReward1.ID,
        OptionalItemReward1.Icon,
        OptionalItemReward2.ID,
        OptionalItemReward2.Icon,
        OptionalItemReward3.ID,
        OptionalItemReward3.Icon,
        OptionalItemReward4.ID,
        OptionalItemReward4.Icon,
        ItemCountCatalyst0,
        ItemCountCatalyst1,
        ItemCountCatalyst2,
        ItemCatalyst0,
        ItemCatalyst1,
        ItemCatalyst2,
        Icon,
        IssuerStart.ID,
        TargetEnd.ID,
        ClassJobCategory0.ID,
        JournalGenre.JournalCategory.ID,
        JournalGenre.ID,
        ActionReward.ID,
        ActionReward.IconHD";
}
