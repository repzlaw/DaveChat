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
    $user = auth()->user();
    return view('pages.index')->with('user',$user);
});

Auth::routes();

Route::middleware('auth')->get('/home', 'PostController@index')->name('home');
 
Route::post('/createpost', [
    'uses' => 'PostController@postCreatePost',
    'as'   => 'post.create'
]);

Route::middleware('auth')->get('/acctUpdate', [

'uses'=> 'AcctController@getAcct',
'as'=>'acctUpdate'
]);
Route::get('userimage/{filename}',[
    'uses'=>'AcctController@getImage',
    'as'=>'account.image'
]);

Route::middleware('auth')->resource('/store', 'AcctController');

Route::get('/delete-post/{id}', [
    'uses'=>'PostController@delete',
    'as'=>'post.delete'

]);


Route::post('/edit', [
    'uses' => 'PostController@postEdit',
    'as'   => 'edit'
]);

Route::post('/like',[
    'uses' => 'PostController@postLikePost',
    'as' =>'like'
]);

Route::get('/account', [
    'uses'=>'AcctController@account',
    'as'=>'account'

]);

Route::get('/store/{{$post->user_id}}', [
    'uses'=>'AcctController@show'
    // 'as'=>'idaccount'

]);