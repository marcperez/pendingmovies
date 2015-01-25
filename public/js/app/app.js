angular.module('PendingMoviesApp', [
  'PendingMoviesApp.controllers'
], function($interpolateProvider) {
        $interpolateProvider.startSymbol('<%');
        $interpolateProvider.endSymbol('%>');
});