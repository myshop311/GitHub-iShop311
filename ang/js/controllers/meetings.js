myApp.controller('meetingsController', function(
  $scope, $rootScope, $firebase, $routeParams,
 $location,   FIREBASE_URL) {
  


  var ref = new Firebase(FIREBASE_URL + '/users/' + $rootScope.currentUser.$id + '/meetings');

console.log(' here 311 ' + $rootScope.currentUser.$id);

  var myMeetingInfo = $firebase(ref);

  var myMeetingObj = $firebase(ref).$asObject();
console.log(myMeetingObj);


 myMeetingObj.$loaded().then(function(data) {
    $scope.meetings = data;
  }); //make sure meetings data is loaded



  //console.log('3222 ' + $rootScope.currentUser)


  $scope.meetings = myMeetingObj;

  $scope.addMeeting = function() {   
  myMeetingInfo.$push({ 
      name: $scope.meetingname,
      date: Firebase.ServerValue.TIMESTAMP
    }).then(function(){
      $scope.meetingname='';
  } );
 };


  $scope.deleteMeeting = function(key) {
    //alert(key);
    var record = $firebase(ref);
    record.$remove(key);
  };//delete Checkin

   

}); //meetingsController