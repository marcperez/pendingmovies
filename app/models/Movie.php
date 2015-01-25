<?php

class Movie extends \Eloquent {

	// Add your validation rules here
	public static $rules = [
		'title' => 'required'
	];

	// Don't forget to fill this array
	protected $fillable = ['title', 'plot', 'genre', 'released_on', 'imdbRating'];


	public static function boot()
    {
        parent::boot();

    	Movie::creating(function($movie)
		{
			$client = new GuzzleHttp\Client();
			$res = $client->get("http://www.omdbapi.com/?t=$movie->title&y=&plot=short&r=json");
			$data = $res->json();

			if($data['Response'] == 'True') {
				$movie->plot = $data['Plot'];
				$movie->released_on = $data['Year'];
				$movie->genre = $data['Genre'];
				$movie->imdbRating = $data['imdbRating'];

				return true;
			}

			return false;
		    //$movie_data = MovieApi::getInfoByTitle($movie->title);
		});
    }

}