angular.module('glyus', [])
.controller('ShorterController', ['$scope', function($scope) {
    $scope.create = function() {
        console.log('creating')
        console.log($scope.url)
    };
}]);