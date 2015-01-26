@extends('layouts.default')


@section('content')


<div class="container movies-list" ng-controller="MoviesCtrl">
	<div class="row">
		<div class="col-sm-12">
			<form action="" method="POST">
				<div class="input-group search-box">
					<input type="text" name="title" class="form-control" placeholder="Add a movie...">
					<span class="input-group-btn">
	                      <button class="btn btn-default" type="submit">Add to list</button>
	                </span>
                </div>
				
			</form>
		</div>
	</div>


	<div class="row">
		@foreach($movies as $movie)
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="{{ $movie->poster->url('medium') }}" alt="..." class="img-responsive">
		      <div class="caption">
		        <h3>{{$movie->title}}</h3>
		        <p>{{$movie->plot}}</p>
		        <p> <span class="label label-warning">{{$movie->imdbRating}}</span> <a href="#" class="btn btn-primary btn-xs" role="button">Watched</a> <a href="#" class="btn btn-danger btn-xs" role="button">Delete</a></p>
		      </div>
		    </div>
		  </div>
		@endforeach
	</div>
</div>

@stop