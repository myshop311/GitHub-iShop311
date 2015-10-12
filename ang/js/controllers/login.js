myApp.controller('loginController', function(
$scope,  $rootScope, $firebaseAuth, $location, Authentication){ //controller
  
 

$scope.login = function(){ //login
	//alert($scope.user.email);
  Authentication.login($scope.user).
  then(function(user){ //user
  	$scope.currentUser = user;
    $rootScope.authEmail =  user.password.email;
  	//alert(user.password.email);
  	//console.log(user);
  	$rootScope.userShow =1;
$location.path('/meetings');
},//user
function(error){// error
	//	alert('xxx');
$scope.message=error.toString();
}//error
); //user
};// login
 
 $scope.logout = function(){
  $rootScope.userShow ='';//console.log('ddd' + $rootScope.userShow);
  $scope.currentUser = null;
};



}); //controller

 