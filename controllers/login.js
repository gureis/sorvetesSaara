angular.module('login',[])

.controller('loginCtrl', function($scope, $request, $helper, $location){
    $(document).ready(function(){
        $('.button-collapse').sideNav({
            menuWidth: 300, // Default is 300
            edge: 'right', // Choose the horizontal origin
            closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
            draggable: true,
          }
        );
        $('.collapsible').collapsible();
    });

    $scope.goToHome = function(){
        $('.button-collapse').sideNav('hide');
        $location.path('/');
    };

    $scope.usuario = {
        login:'',
        senha:''
    };

    $scope.doLogin = function(){
       // $scope.usuario.senha = md5.createHash($scope.usuario.senha);
        $request.login($scope.usuario)
            .then(function(response) {
                $('#ModalLogin').modal('close');
                $scope.usuario.nome = response.nome;
                $scope.usuario.senha = response.senha;

                $helper.setUsuario($scope.usuario);
<<<<<<< HEAD
                $location.path('/');
                Materialize.toast('Bem vindo ' + $scope.usuario.nome, 4000, 'green');
=======
>>>>>>> 4b75b51b71add270730c51d14d3c901f554721f2
            }, function(error) {
                console.log("erro de requisicao", error);
            }
        );
    };
    
})