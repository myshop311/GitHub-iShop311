myApp.controller('checkinsController', function(
  $scope, $rootScope, $firebase, $routeParams,
 $location,   FIREBASE_URL) {
whichUser = $routeParams.uid,
whichMeeting = $routeParams.mid;


  var ref = new Firebase(FIREBASE_URL + '/users/' + whichUser + '/meetings/' +
    whichMeeting + '/checkins/');
  var myCheckInInfo = $firebase(ref);

  var myCheckInObj = $firebase(ref).$asObject();
console.log(myCheckInObj);


 myCheckInObj.$loaded().then(function(data) {
    $scope.checkins = data;
  }); //make sure CheckIns data is loaded
 
$scope.checkins = myCheckInObj;
 
  $scope.addCheckIn = function() {   
  myCheckInInfo.$push({ 
      firstname: $scope.checkin.firstname,
      lastname: $scope.checkin.lastname,
      email: $scope.checkin.email,
      date: Firebase.ServerValue.TIMESTAMP
    }).then(function(){
      $scope.checkin.firstname=''; 
      $scope.checkin.lastname='';
      $scope.checkin.email='';
  } );
 };


  $scope.deleteCheckIn = function(key) {
    //alert(key);
    var record = $firebase(ref);
    record.$remove(key);
  };//delete Checkin
 
  
  $scope.showLove = function(myItem){
 //   console.log('myItem.show ' + myItem.show);
    myItem.show = !myItem.show; 
   // console.log('myItem.show ' + myItem.show);
if(myItem.userState =='expended')
myItem.userState ='';
else
myItem.userState ='expended';
  };//showLove
 
  

 $scope.showAward = function(checkinKey){
    //alert(key);
 
  var refLove = new Firebase(FIREBASE_URL + '/users/' + whichUser + '/meetings/' +
    whichMeeting + '/checkins/' + checkinKey + '/awards/');

  var awardsInfo = $firebase(refLove);
  var awardsObj = $firebase(refLove).$asObject();

 awardsObj.$loaded().then(function(data) {
    $scope.awards = data;
  }); //make sure CheckIns data is loaded
 
$scope.awards = awardsObj;
};

  $scope.addAward = function(checkinKey, myGift) {  
 
  var refLove = new Firebase(FIREBASE_URL + '/users/' + whichUser + '/meetings/' +
    whichMeeting + '/checkins/' + checkinKey + '/awards/');

  var awardsInfo = $firebase(refLove);
  
  awardsInfo.$push({ 
    //alert($scope.gifttext);
      gifttext: myGift,
      date: Firebase.ServerValue.TIMESTAMP
    }).then(function(){
      $scope.gifttext='';
  }); //promise

  };//add Love
 



  $scope.deleteAward = function(checkinKey, awradKey) {
    //alert(key);

  var refLove = new Firebase(FIREBASE_URL + '/users/' + whichUser + '/meetings/' +
    whichMeeting + '/checkins/' + checkinKey + '/awards/' + awardKey);

  var record = $firebase(refLove); 
    record.$remove(key);
  };//delete award
 




}); //CheckInsController