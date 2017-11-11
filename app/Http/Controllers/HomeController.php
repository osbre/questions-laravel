<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get the user-id from auth session
        $user_id     = Auth::id();
        //We take information about quests of the user by its identifier, 
        //then through leftjoin we take information about the quest by its identitor
        $user_quests = DB::table('users_quests')
        ->select('users_quests.*','quests.name','quests.description')
        ->leftJoin('quests', 'users_quests.question_id', '=', 'quests.id')        
        ->where('users_quests.user_id', '=', $user_id)
        ->orderBy('id', 'desc')        
        ->paginate(8);
        //And we return the view, along with the data
        return view('home', ['user_quests' => $user_quests]);
    }

}
