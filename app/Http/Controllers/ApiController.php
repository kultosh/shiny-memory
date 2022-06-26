<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Level;
use App\Models\Operator;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getLevel($slug)
    {
        $list = Answer::whereHas('level', function($query) use($slug) {
            $query->where('slug', 'level-'.$slug)->where('status', 1);
        })->where('status', 1)->first('value');
        $list = json_decode($list->value);
        $operator = Level::with(['operators' => function($query) {
            $query->select('operators.id','type');
        }])->where('slug', 'level-'.$slug)->where('status', 1)->first();
        return response(['data' => ['list' =>$list, 'operator' => $operator]], 200);
    }
}
