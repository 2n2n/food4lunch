var angular = require('angular');
var ngRoute = require('angular-route');

var app = angular.module('App', [ngRoute]);
app.controller('MainController', ['$scope', function($scope) {
    $scope.greet = 'tony';
}]);