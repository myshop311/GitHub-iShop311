myApp.controller('registerController', function(
$scope, $firebaseAuth, $location, Authentication){ //controller
 

$scope.register = function(){ //register
  Authentication.register($scope.user).
  then(function(user){ //user
   // alert('aaaaa');

  Authentication.login($scope.user);
$location.path('/meetings');
},//user
function(error){// error
$scope.message=error.toString();
}//error
); //user
}// register

}); //controller

 