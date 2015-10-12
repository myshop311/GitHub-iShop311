myApp.factory('Authentication', function($firebase, 
  $firebaseAuth, $rootScope, $routeParams, $location, FIREBASE_URL){


var ref= new Firebase(FIREBASE_URL);

var auth= $firebaseAuth(ref);
 

auth.$onAuth(function(authUser){
if(authUser){ 
 var  ref=new Firebase(FIREBASE_URL + '/users/' + authUser.uid);
  var user = $firebase(ref).$asObject();
  //$rootScope.currentUser=user.password.email;
  //alert($rootScope.currentUser);

  $rootScope.userShow =1; console.log('3222 ' + $rootScope.userShow);
  $rootScope.currentUser = user; 
 // console.log('3222 ' + $rootScope.currentUser)
}
else{  //alert('sss') ; 

  $rootScope.userShow =''; 
  //$rootScope.userShow='';
  $rootScope.currentUser = '';
}
});




var myObject ={

login: function(user){ //login
return auth.$authWithPassword({ //authWithPassword
  email: user.email,
  password: user.password
}); //authWithPassword
}, //login
 /*
logout: function(user){
  $rootScope.userShow =''; console.log('ddd' + $rootScope.userShow);
  $scope.currentUser = null;
return  auth.$unauth();
},*/

register: function(user) { 
  return auth.$createUser({
firstname: user.firstname,
lastname: user.lastname,
email:user.email,
password: user.password
}).
  then(function(regUser){ //promise
 var  ref=new Firebase(FIREBASE_URL + 'users');
 var  firebaseUsers = $firebase(ref);

  var userInfo = {
date: Firebase.ServerValue.TIMESTAMP,
regUser: regUser.uid,
firstname: regUser.firstname,
lastname: regUser.lastname,
email: regUser.email,
password: regUser.password
  };//user Info

firebaseUsers.$push(regUser.uid, userInfo);
}) //promise
}, //register


requireAuth : function(){
return auth.$requireAuth();
},

waitForeAuth : function(){
return auth.$waitForAuth();
}
};


return myObject;

});//mApp factory
 


