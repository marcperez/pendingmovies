@extends('layouts.default')


@section('content')


<div class="container movies-list" ng-controller="MoviesCtrl">
	<div class="row">
		<div class="col-sm-12">
			<form action="">
				<input type="text" class="search-box" placeholder="Add a movie...">
			</form>
		</div>
	</div>


	<div class="row">
		@foreach($movies as $movie)
		  <div class="col-sm-6 col-md-4">
		    <div class="thumbnail">
		      <img src="http://cdn.collider.com/wp-content/uploads/boyhood-teaser-poster.jpg" alt="..." class="img-responsive">
		      <div class="caption">
		        <h3>{{$movie->title}}</h3>
		        <p>...</p>
		        <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
		      </div>
		    </div>
		  </div>
		@endforeach
	</div>
</div>

@stop