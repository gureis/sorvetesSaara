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
	
	this.Cadastrar = function(usuario){
		return $http.get('url', usuario)
		.then(function(response) {
			console.log(response);
			//deu certo
		}, function(response) {
			console.log(response);
			// algo de errado
		});
    }
}])