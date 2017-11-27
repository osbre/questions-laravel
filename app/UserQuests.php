<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserQuests extends Model
{
    protected $table = 'users_quests';    

    protected $fillable = [
        'user_id', 'question_id','status'
    ];

}
