myApp.controller('logoutController', function(
$scope,  $rootScope ){ //controller
   
 $scope.logout = function(){ 
  $rootScope.userShow=''; 
  $scope.currentUser = null;
};

}); //controller

 