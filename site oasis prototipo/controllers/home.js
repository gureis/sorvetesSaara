angular.module('home',[])

.controller('homeCtrl', function($scope, $location){
    $(document).ready(function(){
        $('.parallax').parallax();
        $('.modal').modal();
    });
    $scope.inscrever = function(){
        $location.path('/inscrever');
    };
    
})