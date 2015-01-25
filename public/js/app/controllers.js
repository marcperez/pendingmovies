angular.module('PendingMoviesApp.controllers', []).
controller('MoviesCtrl', ['$http', function($scope, $http) {
    $scope.movies = [
    	'Boyhood'
    ];

    $scope.address = {};
  	$scope.refreshMovies = function(movie) {
  		debugger;
	    return $http.get(
	    	'/movies/search/' + movie,
		    {params: params}
	    ).then(function(response) {
	    	console.log(response);
    	});
	};
}]);