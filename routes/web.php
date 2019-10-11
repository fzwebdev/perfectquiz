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


Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');

Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');

Route::group(['as'=>'admin.', 'middleware' => ['auth','admin'], 'prefix' => 'admin'],  function(){
  Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
  Route::resource('subject','SubjectController');
});

View::composer(['*'], function ($view){
  $profiles = DB::table('profiles')
    ->join('users', 'users.id', '=', 'profiles.user_id')
    ->where('users.id', '=', @Auth::user()->id)
    ->get();
  $view->with('profiles',$profiles);
});

Route::group(['as'=>'test.', 'middleware' => ['auth'], 'prefix' => 'test'],  function(){
  Route::get('/subject/{subjectId}', 'TestController@showSubjectTest')->name('subject');
  Route::post('/createTest', 'TestController@createTestPage')->name('createTest');
  Route::resource('subject','TestController');
  Route::get('/attemptTest/{queSetId}', 'TestController@attemptTest')->name('attemptTest');
  // Route::get('/attemptTest', function () {
  //     return view('showTest');
  // })->name('attemptTest');
  Route::get('/showReport/{queSetId}', 'TestController@showReport')->name('showReport');
  Route::get('/all/{id}', 'TestController@getAllTest')->name('all');
  Route::get('/getQuestion/{queSetId}', 'TestController@getQuestion')->name('getQuestion');
  Route::post('/saveAttemptedQuestionsInFile', 'TestController@saveAttemptedQuestionsInFile')->name('saveAttemptedQuestionsInFile');
  Route::get('/fetch_data', 'TestController@fetch_data');
});


Route::get('/showChild', 'HomeController@showChild');
