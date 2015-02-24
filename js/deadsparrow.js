"use strict";
var dsdb = angular.module('dsdb',[
	'ngRoute'
]);

dsdb.factory('bandCrud', function(){
	var bands = [
		{name: 'Nekrokraft', contact: 'Angus Norder', mail: 'angus@norder.se', city: 'Linköping'},
		{name: '540', contact: 'Kristoffer Norder' , mail: 'kristoffer@mail.se', city: 'Sjögesäter'},
		{name: 'At My Trial', contact: 'Fangus' , mail: 'fangrus@mail.se', city: 'Dödvik 1' }
	];

	var factory = {};

	factory.getBands = function(){
		return bands;
	}



	return factory;
});


dsdb.controller('bandCrud', ['$scope','bandCrud', '$filter', function ($scope, bandCrud, $filter){
	$scope.bands = [];
	init();
	function init(){
		$scope.bands = bandCrud.getBands();
	}
	var orderBy = $filter('orderBy');
	$scope.addBand = function (){
		$scope.bands.push({
			name: $scope.newBand.name,
			contact: $scope.newBand.contact,
			mail: $scope.newBand.mail,
			city: $scope.newBand.city
		});
	};

	$scope.order = function(predicate, reverse){
		$scope.bands = orderBy($scope.bands, predicate, reverse);
	}
}]);

dsdb.config(['$routeProvider', function ($routeProvider){
	$routeProvider
		.when('/',
		{
			controller: 'bandCrud',
			templateUrl: 'partials/bands.html'
		})
		.when('/login',{
			controller: '',
			templateUrl: 'partials/login.html'
		})
	
	}
]);