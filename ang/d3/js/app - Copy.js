var myApp = angular.module('myApp', ['ngRoute','firebase',  'appControllers']).
constant('FIREBASE_URL', 'https://idemo311.firebaseio.com/');

var appControllers = angular.module('appControllers', []);

myApp.config(['$routeProvider', function($routeProvider) {
  $routeProvider.
    when('/login', {
      templateUrl: 'views/login.html',
      controller:  'loginController'
    }).  
    when('/register', {
      templateUrl: 'views/register.html',
      controller:  'registerController'
    }).
    when('/meetings', {
      templateUrl: 'views/meetings.html',
     controller:  'meetingsController'
    }).
    when('/checkins/:uid/:mid', {
      templateUrl: 'views/checkins.html',
     controller:  'checkinsController'
    }).
    otherwise({
      redirectTo: '/login'
    });
}]);
 
 