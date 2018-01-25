angular.module('inscrever',[])

.controller('inscreverCtrl', function($scope, $request){
    $(document).ready(function(){
        $('select').material_select();
    });
    $scope.estados = [];
    $scope.cidades = [];
    $scope.confirmarSenha = '';
    $scope.usuario = {
        nome:'',
        email: '',
        sexo: '',
        senha: '',
        cpf: '',
        rg: '',
        cidade: '',
        cep: '',
        estado: '',
        nascimento: ''
    };
    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 100, // Creates a dropdown of 15 years to control year,
        today: 'Hoje',
        clear: 'Limpar',
        close: 'Ok',
        closeOnSelect: false // Close upon selecting a date,
      });

    $scope.getIndexEstado = function(){
        angular.forEach($scope.estados, function(estado, key) {
            if(estado.sigla == $scope.usuario.estado){
                $scope.cidades = $scope.estados[key].cidades;
            }
        });
    };

    $scope.enviarForm = function(){
        if(TestaCPF($scope.usuario.cpf.toString()) == true){
            if($scope.confirmarSenha == $scope.usuario.senha){
                $request.Cadastrar($scope.usuario)
                    .then(function(response) {
                        console.log(response);
                    }, function(error) {
                        console.log("erro de requisicao", error);
                    }
                );
            }
            else{
                Materialize.toast('As senhas dos campos senha e confirmar senha são diferentes', 4000, 'red');
            }
        }else{
            Materialize.toast('CPF inválido, coloque um cpf válido', 4000, 'red');
        }
    };

    $request.getEstadosCidades()
	    .then(function(response) {
	      	$scope.estados = response;
	    }, function(error) {
	       	console.log("erro de requisicao", error);
		}
    );

    function TestaCPF(strCPF) {
        var Soma;
        var Resto;
        Soma = 0;
        if (strCPF == "00000000000") return false;
        
        for (i=1; i<=9; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (11 - i);
        Resto = (Soma * 10) % 11;
        
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(9, 10))) return false;
        
        Soma = 0;
        for (i = 1; i <= 10; i++) Soma = Soma + parseInt(strCPF.substring(i-1, i)) * (12 - i);
        Resto = (Soma * 10) % 11;
        
        if ((Resto == 10) || (Resto == 11))  Resto = 0;
        if (Resto != parseInt(strCPF.substring(10, 11) ) ) return false;
        return true;
    }
    
})