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
// Route::get('/welcome', function () {
//     return view('welcome');
// });

Route::get('/homepage', 'testing@getData');

Route::get('/about', 'testing@showAbout');

Route::get('/myaccount', 'Myaccount@showMyaccount');

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
Auth::routes();
// Route::get('/home', 'HomeController@index')->name('home');

Route::get('/myaccount/unfavourite', 'RejectPost@unfavourite');

Route::get('/myaccount/favourite', 'RejectPost@favourite');

Route::get('/myaccount/unfavouriteMoreData', 'RejectPost@unfavouriteMoreData');

Route::get('/myaccount/favouriteMoreData', 'RejectPost@favouriteMoreData');

Route::get('/adminReview', 'Admin@adminReview');

Route::get('/adminAdvertisement', 'Admin@adminAdvertise');

Route::get('/adminArticle', 'Admin@adminArticle');

Route::get('/checkAndEdit', 'Admin@checkAndEdit');

Route::get('/seePostDetail', 'Admin@postDetail');

Route::get('/rejectPost', 'Admin@rejectPost');

Route::get('seeAdvertiseDetail', 'Admin@seeAdvertiseDetail');

Route::get('/editAdvertise', 'Admin@editAdvertise');

Route::get('/searchActiveAdvertise', 'Admin@searchActiveAdvertise');

Route::get('/searchInactiveAdvertise', 'Admin@searchInactiveAdvertise');

Route::get('/searchPendingReview', 'Admin@searchPendingReview');

Route::get('/searchAcceptReview', 'Admin@searchAcceptReview');

Route::get('/searchRejectReview', 'Admin@searchRejectReview');

Route::get('/myReviewDetail', 'Myaccount@myReviewDetail');

Route::get('/myaccount/editpost', 'RejectPost@editpost');

Route::get('/myaccount/resubmit', 'RejectPost@resubmit');

Route::get('/reviewDetail', 'testing@reviewDetail');

Route::get('/seeArticleDetail', 'Admin@seeArticleDetail');

Route::get('/editArticle', 'Admin@editArticle');

Route::get('/searchActiveArticle', 'Admin@searchActiveArticle');

Route::get('/searchInactiveArticle', 'Admin@searchInactiveArticle');

Route::get('/articleDetail', 'testing@articleDetail');

Route::get('/updateClickCount', 'testing@updateClickCount');

Route::get('/sendComment', 'UploadPost@sendComment');

Route::get('/rating', 'UploadPost@sendRating');








