angular.module('$helper', [])

.service('$helper', ['$http','$q', function($http, $q){

var from = null;

this.setFrom = function(from_param){
	from = from_param;
}

this.getFrom = function () {
	return from;
}

}])