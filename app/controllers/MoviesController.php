<?php

class MoviesController extends \BaseController {

	/**
	 * Display a listing of movies
	 *
	 * @return Response
	 */
	public function index()
	{
		$movies = Movie::all();

		return View::make('movies.index', compact('movies'));
	}

	/**
	 * Show the form for creating a new movie
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('movies.create');
	}

	/**
	 * Store a newly created movie in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$validator = Validator::make($data = Input::all(), Movie::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$repo = App::make('MovieRepository');
		$movie = $repo->create(Input::all());

		return Redirect::route('movies.index');
	}

	/**
	 * Display the specified movie.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$movie = Movie::findOrFail($id);

		return View::make('movies.show', compact('movie'));
	}

	/**
	 * Show the form for editing the specified movie.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$movie = Movie::find($id);

		return View::make('movies.edit', compact('movie'));
	}

	/**
	 * Update the specified movie in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$movie = Movie::findOrFail($id);

		$validator = Validator::make($data = Input::all(), Movie::$rules);

		if ($validator->fails())
		{
			return Redirect::back()->withErrors($validator)->withInput();
		}

		$movie->update($data);

		return Redirect::route('movies.index');
	}

	/**
	 * Remove the specified movie from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		Movie::destroy($id);

		return Redirect::route('movies.index');
	}

}
