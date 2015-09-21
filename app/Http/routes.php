<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group([
    'prefix' => '0.1',
], function() {
    Route::get('/spatis', 'SpatiController@index');
    // Route::get('/spatis/{id}', 'SpatiController@show');
    Route::get('/spatis/closest', [
        'middleware' => 'location',
        'uses' => 'SpatiController@closest',
    ]);

    // Route::group([
    //     'prefix' => '/spatis/{id}',
    // ], function() {
    //     Route::get('/address', 'SpatiController@address');
    //     Route::get('/contact_information', 'SpatiController@contactInformation');
    //
    //
    //     Route::group([
    //         'namespace' => 'Spati',
    //     ], function() {
    //         Route::group([
    //             'prefix' => 'pictures',
    //         ], function() {
    //             Route::get('/', 'PicturesController@index');
    //             Route::get('/{picture_id}', 'PicturesController@show');
    //         });
    //
    //         Route::group([
    //             'prefix' => 'amenities',
    //         ], function() {
    //             Route::get('/', 'AmenitiesController@index');
    //             Route::get('/{amenity_id}', 'AmenitiesController@show');
    //         });
    //
    //         Route::group([
    //             'prefix' => 'opening_times',
    //         ], function() {
    //             Route::get('/', 'OpeningTimesController@index');
    //             Route::get('/{opening_time_id}', 'OpeningTimesController@show');
    //         });
    //
    //         Route::group([
    //             'prefix' => 'alternate_opening_times',
    //         ], function() {
    //             Route::get('/', 'AlternateOpeningTimesController@index');
    //             Route::get('/{alternate_opening_time_id}', 'AlternateOpeningTimesController@show');
    //         });
    //     });
    // });
});
