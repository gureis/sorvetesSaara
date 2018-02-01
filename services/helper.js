angular.module('$helper', [])

.service('$helper', ['$http','$q', function($http, $q){

	var from = null;
	var usuario = {};

	this.setFrom = function(from_param){
		from = from_param;
	}

	this.getFrom = function () {
		return from;
	}
	this.getUsuario = function(){
		return usuario;
	}
	this.setUsuario = function(usuario_param){
		usuario = usuario_param;
	}

}])