<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


/**
** Basic Routes for a RESTful service:
**
** Route::get($uri, $callback);
** Route::post($uri, $callback);
** Route::put($uri, $callback);
** Route::delete($uri, $callback);
**
**/
 
Route::get('groups', function () {
    return response(App\Groups::all(),200);
});
 
Route::get('groups/{group}', function ($groupId) {
    return response(App\Groups::find($groupId), 200);
});
  
 
Route::post('groups', function(Request $request) {
    $resp = App\Groups::create($request->all());
    return $resp;    
});
 
Route::put('groups/{group}', function(Request $request, $groupId) {
    $group = App\Groups::findOrFail($groupId);
    $group->update($request->all());
    return $group;    
});
 
Route::delete('groups/{group}',function($groupId) {
    App\Groups::find($groupId)->delete();

    return 204;
});

/**
**Basic Routes for a RESTful service:
**Route::get($uri, $callback);
**Route::post($uri, $callback);
**Route::put($uri, $callback);
**Route::delete($uri, $callback);
**
*/
 
 
Route::get('groups', 'GroupsController@index');
 
Route::get('groups/{groups}', 'GroupsController@show');
 
Route::post('groups','GroupsController@store');
 
Route::put('groups/{groups}','GroupsController@update');
 
Route::delete('groups/{groups}', 'GroupsController@delete');