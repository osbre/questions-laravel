<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quests extends Model
{
    protected $table = 'quests';
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'questions_ids' => 'json',
    ];
}
