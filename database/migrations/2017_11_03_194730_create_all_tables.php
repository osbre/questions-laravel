<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAllTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('quests', function (Blueprint $table) {
            $table->increments('id');
            $table->text('name');
            $table->text('description');
            $table->json('questions_ids');
            $table->text('final_text');
            $table->timestamps();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->json('wrong_answers_ids');
            $table->integer('correct_answer_id');
            $table->timestamps();
        });

        Schema::create('correct_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('photo_url');
            $table->text('text');
            $table->timestamps();
        });

        Schema::create('wrong_answers', function (Blueprint $table) {
            $table->increments('id');
            $table->text('photo_url');
            $table->text('text');
            $table->timestamps();
        });

        Schema::create('users_quests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->integer('question_id');
            $table->integer('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('quests');
        Schema::dropIfExists('questions');
        Schema::dropIfExists('correct_answers');
        Schema::dropIfExists('wrong_answers');        
        Schema::dropIfExists('users_questions');        
    }
}
