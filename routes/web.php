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


Route::get('/active',function(\Illuminate\Http\Request $request){
    $user_id = decrypt($request->input('activeCode'));
    $user = \App\User::find($user_id);
    $user->status = 1;
    $user->save();
    return view('active');
});
