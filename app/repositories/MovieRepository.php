<?php

/**
 * This service abstracts some interactions that occurs between Controllers and
 * the Database.
 */
class MovieRepository
{

	public function create($input)
	{

		$movie = new Movie;
		$movie_title = array_get($input, 'title');

		$client = new GuzzleHttp\Client();
		$res = $client->get("http://www.omdbapi.com/?t=$movie_title&y=&plot=short&r=json");
		$data = $res->json();

		if($data['Response'] !== 'True') {
			return Redirect::back()->withInput();
		}
	
		$movie->title = $data['Title'];
		$movie->plot = $data['Plot'];
		$movie->released_on = $data['Year'];
		$movie->genre = $data['Genre'];
		$movie->imdbRating = $data['imdbRating'];

		$image = Image::make($data['Poster'])->encode('jpg');
		$image->save(public_path() . '/uploads/posters/' . str_random(20) . '.jpg');

		$movie->poster = $image->dirname . '/' . $image->basename;

		$movie->save();

	}

}