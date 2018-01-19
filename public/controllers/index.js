angular.module('index',[ 'ngRoute', 'home'])
// angular.module('index',[ 'ngRoute', 'ngCookies', 'home'])

.controller('indexController', function($location, $scope, $window){
    $(".button-collapse").sideNav();
    $scope.redirectToLinkedin = function () {
        $window.open('https://www.linkedin.com/in/felipe-custodio-firmino/', '_blank');
    };
})

.config(function($routeProvider, $locationProvider) {
    
        $routeProvider.when('/', {
            templateUrl: 'views/home.html',
            controller: 'homeCtrl'
        }).otherwise({
            redirectTo: "/"
        });
        $locationProvider.html5Mode({
            enabled: true,
            requireBase: false
        });
    
    })