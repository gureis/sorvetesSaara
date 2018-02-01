angular.module('$request', [])

.service('$request', ['$http','$q', function($http, $q){

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

	this.cadastrar = function(usuario){
		console.log(usuario);
		return $http.post('https://localhost/saarice/php/cadastro_usuario.php', usuario)
		.then(function(response) {
			console.log(response);
			//deu certo
		}, function(response) {
			console.log(response);
			// algo de errado
		});
	}

	this.alterarDados = function(usuario){
		console.log(usuario);
		return $http.post('https://localhost/saarice/php/update.php', usuario)
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
		return $http.post('https://localhost/saarice/php/validar_acesso.php', usuario)
		.then(function(response) {
			console.log(response);
			//deu certo
		}, function(response) {
			console.log(response);
			// algo de errado
		});
    }
}])