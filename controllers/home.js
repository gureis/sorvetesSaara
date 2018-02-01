angular.module('home',[])

.controller('homeCtrl', function($scope, $location, $helper){
    $(document).ready(function(){
        $('.parallax').parallax();
        $('.modal').modal();
        $(".button-collapse").sideNav();
        $('.dropdown-button').dropdown();
        $('.collapsible').collapsible();
    });
    // alert("to na home");
    $scope.inscrever = function(path){
   		$location.path('/inscrever');
    };
    $scope.editarPerfil = function(){
    	$location.path('/editarPerfil');
    };
    $scope.pageLoginMob = function(){
        $location.path('/login-mobile');
    };
    $scope.usuarioLogado = $helper.getUsuario();
    var $doc = $('html, body');
    $('.scrollSuave').click(function() {
        $doc.animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 500);
        return false;
    });
})