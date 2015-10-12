myApp.directive = ('confirmationNeeded', 
	function(){ 
		priority:1;
		terminal: true;
		link: function(scope, element, sttr){
var msg = attr.confirmationNeeded || "Are you sure you want to delete this item?";
var clickAction = element.ngClick;



	})