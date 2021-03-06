angular.module('inscrever',[])

.controller('inscreverCtrl', function($scope, $request, $helper, $location, md5){
    $(document).ready(function(){
        $('select').material_select();
        $('.button-collapse').sideNav({
            menuWidth: 300, // Default is 300
            edge: 'right', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true, 
          }
        );
    });

    $('.datepicker').pickadate({
        selectMonths: true, // Creates a dropdown to control month
        selectYears: 100, // Creates a dropdown of 15 years to control year,
        today: 'Hoje',
        clear: 'Limpar',
        close: 'Ok',
        closeOnSelect: false, // Close upon selecting a date,
        format: 'yyyy-mm-dd',
    });

    $scope.estados = [];
    $scope.cidades = [];
    $scope.confirmarSenha = "";
    $scope.sexos = [{nome:'Masculino',sigla:'M'}, {nome:'Feminino', sigla:'F'}, {nome:'Outro', sigla:'O'}];
    $scope.usuario = {
        nome:"",
        sobrenome: "",
        email: "",
        sexo: "",
        senha: "",
        cpf: '',
        rg: '',
        cidade: "",
        cep: "",
        estado: "",
        nascimento: "",
        telefone: '',
        endereco: ''
    };

    $scope.usuarioLogado = $helper.getUsuario();
    if($scope.usuarioLogado.logado){
        console.log("Usuario logado",$scope.usuarioLogado);
        $request.buscarUsuario($scope.usuarioLogado)
            .then(function(response) {
                console.log("dados que estao vindo",response);
                $("#cidade").val(response.cidade);
                $("#estado").val(response.estado);
                $("#nascimento").val(response.nascimento);
                $("#sexo").val(response.sexo);
                $scope.usuario = {
                    nome: response.nome,
                    sobrenome: response.sobrenome,
                    email: response.email,
                    sexo: response.sexo,
                    senha: "",
                    cpf: parseInt(response.cpf),
                    rg: response.rg,
                    cidade: response.cidade,
                    cep: parseInt(response.cep),
                    estado: response.estado,
                    nascimento: response.nascimento,
                    telefone: parseInt(response.telefone),
                    endereco: response.endereco
                };
            }, function(error) {
                console.log("erro de requisicao", error);
            }
        );
    }else{
        console.log("deu ruim");
    }

    $scope.getIndexEstado = function(){
        angular.forEach($scope.estados, function(estado, key) {
            if(estado.sigla == $scope.usuario.estado){
                $scope.cidades = $scope.estados[key].cidades;
            }
        });
    };

    $scope.goToHome = function(){
        $('.button-collapse').sideNav('hide');
        $location.path('/');
    };

    $scope.enviarForm = function(){
        if(TestaCPF($scope.usuario.cpf.toString()) == true){
            if($scope.confirmarSenha === $scope.usuario.senha){
                if($scope.usuario.estado !== ""){
                    if($scope.usuario.cidade !== ""){
                        if($scope.usuario.sexo !== ""){
                            if($('.datepicker').val() !== ""){
                                if($scope.confirmarSenha != "" && $scope.usuario.senha != ""){
                                    $scope.usuario.nascimento = $('.datepicker').val();
                                    $request.cadastrar($scope.usuario)
                                        .then(function(response) {
                                            console.log(response);
                                            if(response.status === "ok") {
                                                $location.path('/');
                                                Materialize.toast('Cadastro realizado com sucesso!', 4000, 'green');
                                                var user = {
                                                    logado: true,
                                                    login: response.login,
                                                    senha: response.senha,
                                                    nome: $scope.usuario.nome
                                                };
                                                $helper.setUsuario(user);
                                            }else{
                                                Materialize.toast(response.status, 4000, 'red');
                                            }
                                        }, function(error) {
                                            console.log("erro de requisicao", error);
                                        }
                                    );
                                }
                                else{
                                    Materialize.toast('Campos senhas vazios', 4000, 'red');
                                }
                            }else{
                                Materialize.toast('Selecione sua data de nascimento', 4000, 'red');
                            }
                        }else{
                            Materialize.toast('Selecione seu sexo', 4000, 'red');
                        }
                    }else{
                        Materialize.toast('Selecione sua cidade', 4000, 'red');
                    }
                }else{
                    Materialize.toast('Selecione o seu estado', 4000, 'red');
                }  
            }else{
                console.log("senha", $scope.confirmarSenha);
                console.log("confirmar", $scope.usuario.senha)
                Materialize.toast('As senhas dos campos senha e confirmar senha são diferentes', 4000, 'red');
            }
        }else{
            Materialize.toast('CPF inválido, coloque um cpf válido', 4000, 'red');
        }
    };

    $scope.enviarFormAlterar = function(){
        $request.alterarCadastro($scope.usuario)
            .then(function(response) {
                console.log(response);
                if(response.status === "ok") {
                    $location.path('/');
                    Materialize.toast('Dados alterados com sucesso!', 4000, 'green');
                    var user = {
                        login: response.login,
                        senha: response.senha,
                        nome: $scope.usuario.nome
                    };
                    $helper.setUsuario(user);
                }else{
                    Materialize.toast(response.status, 4000, 'red');
                }
            }, function(error) {
                console.log("erro de requisicao", error);
            }
        );
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
        if (strCPF == "11111111111") return false;       
        if (strCPF == "22222222222") return false;       
        if (strCPF == "33333333333") return false;       
        if (strCPF == "44444444444") return false;       
        if (strCPF == "55555555555") return false;       
        if (strCPF == "66666666666") return false;       
        if (strCPF == "77777777777") return false;       
        if (strCPF == "88888888888") return false;       
        if (strCPF == "99999999999") return false;       
        if (strCPF.length > 11) return false;

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
    };
    
})