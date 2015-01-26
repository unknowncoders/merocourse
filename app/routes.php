<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::group(['before'=>'auth'],function(){

          Route::get('/',function(){

              return "Home page";

          });

          Route::get('logout',[
                  'uses'=>'SessionController@destroy',
                    'as'=>'session.destroy'
          ]);
});

Route::group(['before'=>'guest'],function(){

            Route::get('login',[
                    'uses'=>'SessionController@create',
                    'as'=>'session.create'
            ]);
            
            Route::get('register',[
                    'uses'=>'UsersController@create',
                    'as'=>'users.create'
            ]);

});


Route::get('register/activate/{confirmationCode}',[
        'uses' => 'UsersController@confirm',
        'as' => 'users.confirm'
]);

Route::resource('users','UsersController');
Route::resource('session','SessionController');
