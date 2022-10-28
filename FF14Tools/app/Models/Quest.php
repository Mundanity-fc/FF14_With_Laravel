<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quest extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'name_cn',
        'name_en',
        'name_jp',
        'start_place',
        'start_npc',
        'end_npc',
        'gil_reward',
        'exp_reward',
        'item_reward',
        'option_reward',
        'catalyst_reward',
        'action_reward',
        'banner',
        'icon',
        'job',
        'category',
        'genre'
    ];
}
