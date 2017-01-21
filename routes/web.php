<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/


Route::get('index', function () {
    return view('index');
});

Auth::routes();

Route::get('profile', 'PagesController@myprofile')->name('profile');

Route::get('profile/{slug}', 'PagesController@userprofile')->name('userprofile');

Route::get('/', 'PagesController@feed')->name('feed');

Route::post('savecover','ProfileController@savecover');

Route::post('savedp','ProfileController@savedp');

Route::post('jcrop', 'ProfileController@jcrop');

Route::post('editprofilename', 'ProfileController@editprofilename');

Route::post('price', 'ProfileController@price');

Route::post('createstatus', 'ContentController@createstatus');

Route::post('createvideo', 'ContentController@createvideo');

Route::post('createphoto', 'ContentController@createphoto');

Route::post('createaudio', 'ContentController@createaudio');

Route::post('createdocument', 'ContentController@createdocument');

Route::post('deletecontent', 'ContentController@deletecontent');

Route::post('editbenefits', 'ProfileController@editbenefits');

Route::post('updatejob', 'ProfileController@updatejob');

Route::post('unsubscribe', 'SubscribeController@unsubscribe')->name('subscribe');

Route::get('downloadpdf', 'ContentController@downloadpdf');



Route::get('search', 'PagesController@search');

Route::get('comment/{id}', 'PagesController@showComments');

Route::post('like', 'LikeController@store');

Route::post('storecomment', 'CommentController@storecomment');

Route::post('storereply', 'CommentController@storereply');

Route::get('logout', 'Auth\LoginController@logout');

Route::group(['prefix'=> 'subscription'], function()
{
    Route::get('/', [
        'as'=> 'subscriptionform',
        'uses'=> 'SubscriptionController@getSubForm'
    ]);
    Route::get('/f', [
        'as'=> 'subscription',
        'uses'=> 'SubscriptionController@getIndex'
    ]);
});

Route::post('account/stripe_card_token', 'SubscriptionController@join');

Route::get('registerforpayment', 'PagesController@registerforpayment');

Route::post('registerforpayment', 'SubscriptionController@registerforpayment');






