angular.module('home',['angular-timeline'])

.controller('homeCtrl', function($scope, $http){
    var obj = {id:2};
    $http.post('localhost:3000/test2', obj).then(function(response) {
        console.log(response);
    });
})