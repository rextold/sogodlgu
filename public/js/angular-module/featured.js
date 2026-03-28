var app = angular.module('myApp', ['ngSanitize']); 
app.controller('featurednewsCtrl', function($scope, $http) {
	$scope.url = window.location.origin;
	$http.get($scope.url+"/api/news").then(function (response) {
    	$scope.articles = response.data.data;
	});
});

app.controller('announcementsCtrl', function($scope, $http) {
	$scope.url = window.location.origin;
    $http.get($scope.url+"/api/announcements").then(function (response) {
	    $scope.announcements = response.data;
	});
});

app.controller('barangayCtrl', function($scope,$http) {
    $scope.url = window.location.origin;
    $http.get($scope.url+"/api/barangay").then(function (response) {
      $scope.barangays = response.data; 
    });
});

app.controller('eventsrndm', function($scope, $http) {
	$scope.url = window.location.origin;
    $http.get($scope.url+"/api/events/rndmlist").then(function (response) {
	    $scope.rndmlist = response.data;
	});
});

app.controller('eventslist', function($scope, $http) {
	$scope.url = window.location.origin;
    $http.get($scope.url+"/api/events").then(function (response) {
	    $scope.events = response.data.data;
	    console.log($scope.events);
	});
});
app.controller('showmmsgCtrl', function($scope, $http) {
	$scope.url = window.location.origin;
    $http.get($scope.url+"/api/mmsg").then(function (response) {
	    $scope.mmsg = response.data;
	});
});
app.filter('myDateFormat', function myDateFormat($filter){
  	return function(text){
    	var  tempdate= new Date(text.replace(/-/g,"/"));
    	return $filter('date')(tempdate, "MMM-dd-yyyy");
 	}
});