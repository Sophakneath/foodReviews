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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', 'testing@getData');

Route::get('/about', 'testing@showAbout');

Route::get('/signin', 'testing@signin');

// Route::post('/signin/checkLogin', 'testing@checkLogin');

Route::get('/signup', 'testing@signup');

Route::get('/myaccount', 'testing@showMyaccount');

Route::get('/SeeMore', 'moreData@showData');

Route::get('/SeeMoreFood', 'moreData@showDataFood');

Route::get('/SeeMoreMeat', 'moreData@showDataMeat');

Route::get('/SeeMoreHealthy', 'moreData@showDataHealthy');

Route::get('/SeeMoreSpicy', 'moreData@showDataSpicy');

Route::get('/SeeMoreDrink', 'moreData@showDataDrink');

Route::get('/SeeMoreSmo', 'moreData@showDataSmo');

Route::get('/SeeMoreJuice', 'moreData@showDataJuice');

Route::get('/SeeMoreEnergy', 'moreData@showDataEnergy');

Route::get('/SeeMoreAlc', 'moreData@showDataAlc');

Route::get('/SeeMoreDessert', 'moreData@showDataDessert');

Route::get('/SeeMoreCoo', 'moreData@showDataCoo');

Route::get('/SeeMoreCake', 'moreData@showDataCake');

Route::get('/SeeMoreCho', 'moreData@showDataCho');

Route::get('/SeeMoreIce', 'moreData@showDataIce');

Route::get('/moreView', 'moreData@showTopView');

Route::get('/moreRating', 'moreData@showTopRating');

Route::get('/searchDishes', 'searchDishes@showResult');

Route::get('/food', 'mainCategory@getFood');

Route::get('/drink', 'mainCategory@getDrink');

Route::get('/dessertsAndBakes', 'mainCategory@getDessert');

Route::get('/moreViewFood', 'moreData@showTopViewFood');

Route::get('/moreRatingFood', 'moreData@showTopRatingFood');

Route::get('/searchFood', 'searchDishes@showFood');

Route::get('/moreViewDrink', 'moreData@showTopViewDrink');

Route::get('/moreRatingDrink', 'moreData@showTopRatingDrink');

Route::get('/searchDrink', 'searchDishes@showDrink');

Route::get('/moreViewDessert', 'moreData@showTopViewDessert');

Route::get('/moreRatingDessert', 'moreData@showTopRatingDessert');

Route::get('/searchDessert', 'searchDishes@showDessert');