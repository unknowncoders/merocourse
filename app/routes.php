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

/*Route::group(['before'=>'auth|confirmed'],function(){

Route::get('test',function()
     {
             return View::make('home/test');
    });
          Route::get('/','HomeController@showhome');
          Route::get('subject/{facultyname}/{semestername}','HomeController@showsubject');
          Route::get('review/{subjectname}','HomeController@showreview');
          Route::post('newreview/{subjectname}','HomeController@newreview');
      
          Route::post('like/{reviewid}','HomeController@like');
});
 */

Route::model('users','User');
Route::model('courses','Course');
Route::model('subjects','Subject');

Route::pattern('users','[0-9]+');
Route::pattern('courses','[0-9]+');
Route::pattern('subjects','[0-9]+');

Route::group(['before'=>'guest'],function(){

            Route::get('login',[
                    'uses'=>'SessionController@create',
                    'as'=>'session.create'
            ]);

             Route::post('login',[
                    'uses'=>'SessionController@store',
                    'as'=>'session.store'
            ]);

            
            Route::get('register',[
                    'uses'=>'UsersController@create',
                    'as'=>'users.create'
            ]);

            Route::resource('users','UsersController',['only'=>['create','store']]);

});

Route::group(['before'=>'auth'],function(){

             Route::get('logout',[
                  'uses'=>'SessionController@destroy',
                    'as'=>'session.destroy'
             ]);

            Route::get('register/resend',[
                    'uses' => 'UsersController@getResend',
            ]);
            
            Route::post('register/resend',[
                    'uses' => 'UsersController@postResend',
            ]);

});

Route::group(['before'=>'auth|confirmed'],function(){

          Route::get('/','PagesController@home');
          Route::resource('users','UsersController',['except'=>['create','store','destroy']]);

          Route::resource('courses','CourseController',['only'=>['show']]);
          Route::resource('subjects','SubjectController',['only'=>['show','store']]); 

});

Route::group(['before'=>'auth|confirmed|admin','prefix'=>'admin'],function(){

          Route::resource('users','AdminUsersController');

          Route::post('users/{users}/toggleAdmin','AdminUsersController@toggleAdmin');

          Route::get('/',function(){ return View::make('admin.dashboard'); });

});

Route::get('register/activate/{confirmationCode}',[
        'uses' => 'UsersController@confirm',
        'as' => 'users.confirm'
]);



