angular.module('$helper', [])

.service('$helper', ['$http','$q', function($http, $q){

	var from = null;
	var usuario = {
		logado:false,
		login:'',
		nome:'',
		senha:''
	};

	this.sairUsuario = function(){
		usuario.logado = false;
		usuario.login = '';
		usuario.nome = '';
		usuario.senha = '';
	}

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
		usuario.logado = true;
		usuario.nome = usuario_param.nome;
		usuario.senha = usuario_param.senha;
		usuario.login = usuario_param.login;
	}

}])