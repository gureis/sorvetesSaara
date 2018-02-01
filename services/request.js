angular.module('$request', [])

.service('$request', ['$http','$q', function($http, $q){

	var config = {
		headers:{
			'Access-Control-Allow-Origin': 'localhost/*',
			'Access-Control-Allow-Methods': 'GET, PUT, POST',
			'Content-Type':'application/x-www-form-urlencoded'
		}
	};

	this.getEstadosCidades = function(){
		return $http.get('./services/data/estados-cidades.json')
            .then(function(response) {
                return response.data;
            }, function(response) {
                // something went wrong
                return $q.reject(response.data);
            }
        );
	}
	
	// this.cadastrar = function(usuario){
	// 	return $http.get('http://localhost/teste/teste.php', usuario, config)
	// 	.then(function(response) {
	// 		console.log(response);
			
	// 	}, function(response) {
	// 		console.log(response);
			
	// 	});
	// }
	this.cadastrar = function(usuario){
		console.log(usuario);
		return $http({
			method: "post",
			url: 'http://localhost/saarice/php/cadastro_usuario.php',
			data:usuario,
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		})
			.then(function(response) {
			return response.data;
		}, function(response) {
			console.log(response);
			// algo de errado
		});
	}
	
	this.alterarCadastro = function(usuario){
		console.log(usuario);
		return $http({
			method: "post",
			url: 'http://localhost/saarice/php/cadastro_usuario.php',
			data:usuario,
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		})
			.then(function(response) {
			console.log(response);
			//deu certo
		}, function(response) {
			console.log(response);
			// algo de errado
		});
	}

	this.login = function(usuario){
		console.log(usuario);
		return $http({
			method: "post",
			url: 'http://localhost/saarice/php/validar_acesso.php',
			data:usuario,
			headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
		})
		.then(function(response) {
			console.log(response);
			//deu certo
		}, function(response) {
			console.log(response);
			// algo de errado
		});
    }
}])