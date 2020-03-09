<?php

use App\Classe;
use App\Student;
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

Route::group(['prefix' => 'v1'], function () {
    Route::get('', function () {
        return response()->json(['status' => 'CLASSROOM_API_ONLINE', 'version' => 'v1']);
    });
    // TEST RELATIONS
    // Route::get('students', function () {
    //     return response()->json(Classe::all()[0]->students);
    // });
    // Route::get('/schools', 'SchoolController@index');
    Route::resource('schools', 'SchoolController');
});
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
