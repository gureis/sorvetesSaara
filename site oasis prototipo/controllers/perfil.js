angular.module('perfil',[])

.controller('perfilCtrl', function($scope, $location){
    $(document).ready(function(){
        $('.modal').modal();
    });

    $scope.goToEditarPerfil = function(){
        $location.path('/editar-perfil');
    };
})