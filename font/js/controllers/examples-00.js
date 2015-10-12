myApp.controller('ExamplesController', 
  function($scope, $rootScope, 
    $firebase, $firebaseSimpleLogin, FIREBASE_URL) {

var ref = new Firebase(FIREBASE_URL);
var simpleLogin = $firebaseSimpleLogin(ref);

  simpleLogin.$getCurrentUser().then(function(authUser) {

    if (authUser !== null) {
      var ref = new Firebase(FIREBASE_URL + '/users/' 
          + authUser.uid + '/Examples');
      var ExamplesInfo = $firebase(ref);
      var ExamplesObj = $firebase(ref).$asObject();
      var ExamplesArray = $firebase(ref).$asArray();

      ExamplesObj.$loaded().then(function(data) {
        $scope.Examples = ExamplesObj;
      }); // Examples Object Loaded

      ExamplesArray.$loaded().then(function(data) {
        $rootScope.howManyExamples = ExamplesArray.length;
      }); // Examples Array Loaded

      ExamplesArray.$watch(function(event) {
        $rootScope.howManyExamples = ExamplesArray.length;
      });

      $scope.addExample=function() {
        ExamplesInfo.$push({
          name: $scope.Examplename,
          date: Firebase.ServerValue.TIMESTAMP
        }).then(function() {
          $scope.Examplename = '';
        });
      } //addExample

      $scope.deleteExample=function(key) {
        ExamplesInfo.$remove(key);
      } //deleteExample

    } // user exists

  }); //get current user

}); //ExamplesController