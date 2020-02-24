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

Route::post('/getsuggest', 'testing@getKeySuggestion');

Route::post('/editProfile', 'EditProfile@editP');

Route::post('/myaccount/uploadPost', 'UploadPost@upload');

Route::post('/myaccount/reupload', 'RejectPost@update');

Route::post('/checked', 'RejectPost@acceptPost');

Route::post('/uploadAvertisement', 'UploadPost@uploadAdvertise');

Route::post('/uploadEditAdvertise', 'UploadPost@uploadEditAdvertise');

Route::post('/uploadArticle', 'UploadPost@uploadArticle');

Route::post('/uploadEditArticle', 'UploadPost@uploadEditArticle');
