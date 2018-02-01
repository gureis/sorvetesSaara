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
   		console.log("home");
    };
    $scope.editarPerfil = function(){
    	$location.path('/editarPerfil');
    };
    $scope.pageLoginMob = function(){
        console.log("chamou");
        $location.path('/login-mobile');
    };
    var $doc = $('html, body');
    $('.scrollSuave').click(function() {
        $doc.animate({
            scrollTop: $( $.attr(this, 'href') ).offset().top
        }, 500);
        return false;
    });
})