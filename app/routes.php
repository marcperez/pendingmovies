<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::resource('movies', 'MoviesController');

Route::get('movies/search/{movie_title}', function($movie_title) {
	$client = new GuzzleHttp\Client();
	$res = $client->get("http://www.omdbapi.com/?s=$movie_title&r=json");
	return Response::json($res->json()['Search']);

});