var angular = require('angular');

var ngRoute = require('angular-route');

var app = angular.module('App', [ngRoute]);

/* MAIN CONTROLLER */
app.controller('MainController', ['$scope', function($scope) {
    $scope.greet = 'tony';
}]);
/* END of MAIN CONTROLLER */

app.controller('RegistrationController', ['$scope', function($scope) {
  $scope.register = function() {
    alert('Hello Register');
  }
}]);
