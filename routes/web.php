<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::group(['middleware' => ['web']], function() {
    Route::get('/quest/{name}', ['as' => 'quest.name', 'uses' => 'QuestController@playQuest']);
    Route::get('/question/{questname}/{id}', ['as' => 'question.questname.id', 'uses' => 'QuestController@showQuestion']);    
});

Route::get('/quests', ['as' => 'quests', 'uses' => 'IndexController@listQuests']);

Route::get('/home', 'HomeController@index')->name('home');
