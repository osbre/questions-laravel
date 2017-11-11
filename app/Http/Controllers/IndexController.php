<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Quests;

class IndexController extends Controller
{
    

    public function listQuests()
    {
        //We take all the quests that are in the database, divide by 6 quests per page
        $quests = Quests::paginate(5);
        //And we return the view, along with the data
        return view('quests', ['quests' => $quests]);
    }
}
