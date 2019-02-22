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

/*
 * // Metainabce Mode
Route::get('/', function () {
    return view('welcome');
});
*/
URL::forceSchema("https");
Route::get('/setupdb','first_time_conf@index');
Route::get('/source','sources_controller@index');
Route::get('/explorer','explorer_controller@index');
Route::get('/fetcher','fetcher_controller@index');
Route::get('/getvid','video_gallary@index');
Route::get('/sitemap.xml','seo_controller@xmlSiteMap');
Route::get('/feed','seo_controller@rssfeed');
Route::get('/report','error_controller@error_monitor');
Route::resource('queries', 'QueryController');
Route::get('testlib','test_lib@index');
Route::get('backup','test_lib@backup');
Route::get('/','main_shower_controller@index');
Route::get('search', 'search_controller@Search');
Route::get('/{section}/{title}', ['uses' =>'shower_controller@index']);
Route::get('/{section}', ['uses' =>'section_shower_controller@index']);
//Auth::routes();

//Route::get('/home', 'HomeController@index');
