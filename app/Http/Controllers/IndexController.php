<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quests;

class IndexController extends Controller
{
    

    public function listQuests()
    {
        $quests = Quests::paginate(2);
        
        return view('quests', ['quests' => $quests]);
    }
}
