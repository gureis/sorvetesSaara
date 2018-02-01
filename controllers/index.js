angular.module('index',[ 'ngRoute', 'ui.materialize', 'angular-md5', 'login','home','$helper', 'inscrever', '$request'])

.controller('indexController', function($location, $scope, $window){
    $(".button-collapse").sideNav();

     $(document).ready(function(){
        $('.modal').modal();
        $('.collapsible').collapsible();
    });
    var $doc = $('html, body');
    $scope.inscrever = function(path){
        $location.path('/inscrever');
        $helper.setFrom(path);
    };
})

.config(function($routeProvider, $locationProvider) {
    
    $routeProvider.when('/', {
        templateUrl: 'views/conteudo-home.html',
        controller: 'homeCtrl'
    }).when('/inscrever', {
        templateUrl: 'views/inscrever.html',
        controller: 'inscreverCtrl'
    }).when('/conteudo-home', {
        templateUrl: 'views/conteudo-home.html',
        controller: 'perfilCtrl'
    }).when('/editar-perfil', {
        templateUrl: 'views/editar-perfil.html',
        controller: 'editarPerfilCtrl'
    }).when('/login-mobile', {
        templateUrl: 'views/login-mobile.html',
        controller: 'loginCtrl'
    }).otherwise({
        redirectTo: "/"
    });
    
    $locationProvider.html5Mode({
        enabled: true,
        requireBase: false
    });
    
})