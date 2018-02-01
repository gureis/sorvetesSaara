angular.module('login',[])

.controller('loginCtrl', function($scope, $request, $helper, $location, md5){
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
        $scope.usuario.senha = md5.createHash($scope.usuario.senha);
        $request.login($scope.usuario)
            .then(function(response) {
                console.log(response);
                $('#ModalLogin').modal('close');
            }, function(error) {
                console.log("erro de requisicao", error);
            }
        );
    };
})