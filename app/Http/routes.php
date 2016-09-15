<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

use LucaDegasperi\OAuth2Server\Facades\Authorizer;


Route::get('/', function () {
    return view('app');
});
Route::post('oauth/access_token', function() {
    return Response::json(Authorizer::issueAccessToken());
});
Route::group(['middleware'=>'oauth'],function(){

    Route::resource('client','ClientController',['except'=>['create','edit']]);

    //Utilizando middleware para validação de acesso;
    /*Route::Group(['middleware'=> 'CheckProjectOwner'],function(){
        Route::resource('project','ProjectController',['except'=>['create','edit']]);
    });*/
    Route::resource('project','ProjectController',['except'=>['create','edit']]);
    Route::group(['prefix'=>'project'],function (){

        Route::get('{id}/note', 'ProjectNoteController@index');
        Route::get('{id}/note/{noteid}', 'ProjectNoteController@show');
        Route::post('{id}/file/','ProjectFileController@store');

        Route::get('note/{id}/','ProjectController@destroy');
    });





   /* Route::get('/client','ClientController@index');
    Route::post('/client', 'ClientController@store');
    Route::get('/client/{id}', 'ClientController@show');
    Route::delete('/client/{id}', 'ClientController@destroy');*/


    /*Route::get('/project/{id}/note', 'ProjectNoteController@index');
    Route::get('/project/{id}/note/{noteid}', 'ProjectNoteController@show');
    Route::post('/project/{id}/', 'ProjectController@store');

    Route::get('/project', 'ProjectController@index');
    Route::post('/project', 'ProjectController@store');
    Route::get('/project/{id}', 'ProjectController@show');
    Route::delete('/project/{id}', 'ProjectController@destroy');
    */
});