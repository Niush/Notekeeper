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
use Illuminate\Http\Request;

Route::middleware('auth')->group(function(){
    Route::get('/note', 'NoteController@note')->name('note');
    Route::post('/note', 'NoteController@new')->name('new_note');
    Route::post('/delete/{id}', 'NoteController@delete');
    Route::get('/delete/{id}', function(){
        return redirect()->route('home')->with('msgE','Delete Failed.');
    });

    Route::get('/trash', 'NoteController@trash')->name('trash');
    Route::post('/restore/{id}', 'NoteController@restore');

    Route::get('/edit/{id}', 'NoteController@edit');
    Route::post('/edit/{id}', 'NoteController@edit')->name('edit_note');

    Route::get('/search/{query}', 'SearchController@search')->name('search');
});

Route::get('/', function () {
    return view('welcome');
    //return redirect()->route('home');
})->name('index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/dashboard', 'HomeController@index')->name('dashboard');
Route::get('/logout',function(Request $request){
    Auth::logout();
    $request->session()->invalidate();
    return redirect()->route('index')->with('msgS','Logged Out !!');;
});
