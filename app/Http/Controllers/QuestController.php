<?php

namespace App\Http\Controllers;

use DB;
use Helper;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\UserQuests;
use App\Questions;
use App\Quests;

class QuestController extends Controller
{

    public function playQuest(string $name)
    {
        //We are looking for a quest whose name is the same as in the address bar
        $quest = Quests::where('name', $name)->get();
        //Take the list of questions-ids to this quest
        $questions = $quest->pluck('questions_ids');
        //And we will only take the id of the first question
        $first_question = json_decode($questions[0][1],true);

        return view('quest',['quest'       => $quest,
                             'question_id' => $first_question]);
    }

    public function showQuestion($quest_name,$id){
        $quest = Quests::where('name', $quest_name)->get();
        $final_text = $quest->pluck('final_text');

        //if the quest exists
        if(!$quest->isEmpty()){
            $questions_ids = $quest->pluck('questions_ids');

            $last_id = count($questions_ids[0])-1;
            
            $end_element = $questions_ids[0][$last_id];
            $next_id = $id++;

            if($questions_ids[0][$next_id] == $end_element){
                $next_questions_url = '/home';
                $isEndQuestion = true;
                
                //insert to user-quests table
                $quest_id = $quest->pluck('id');
                UserQuests::create([
                    'user_id'     => Auth::id(),
                    'question_id' => $quest_id[0],
                    'status'      => $id,
                ]);
            }else{
                $next_questions_url = $id++;      
                $isEndQuestion      = false;          
            }

            $next_element = $questions_ids[0][$next_id];
            //Looking for information from the question table in database, by its identifier
            $data = Questions::where('id',$next_element)->get();

            if($data->isEmpty()){
                abort(404);
            }else{

                //Determine the correct answer, and the array of wrong answers
                $correct_answer = $data->pluck('correct_answer_id');
                $wrong_answers_ids = $data->pluck('wrong_answers_ids');
                

                foreach ($data as $question) {}
                    
                //Add the correct answer and the wrong one in one array
                $answers = array_collapse([$wrong_answers_ids[0], $correct_answer]);
                
                //Random sort of array
                shuffle($answers);
                

                //We read the response IDs, and we find information for them from database data
                foreach($answers as $answer){
                    if($answer == $correct_answer[0]){
                        $answers_data[] = DB::table('correct_answers')->find($answer);                
                    }else{
                        $answers_data[] = DB::table('wrong_answers')->find($answer);
                    }           
                }


                //We return the view to the user by passing the information she needs
                return view('question', ['question'      => $data,
                                        'answers_data'  => $answers_data,
                                        'correct_answer'=> $correct_answer[0],
                                        'count_answers' => count($answers),
                                        'next_questions_url' => $next_questions_url,
                                        'isEndQuestion' => $isEndQuestion,
                                        'final_text'    => 'Ви пройшли квест',//$final_text[0]
                                        ]);
            }
        }else{
            abort(404);
        }
    }
}
