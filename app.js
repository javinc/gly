angular.module('glyus', [])
.controller('ShorterController', ['$scope', function($scope) {
    $scope.create = function() {
        if($scope.url != undefined && $scope.url != '') {
            console.log('creating')
            console.log($scope.url)

            $scope.new = $scope.url;
        }
    };
}]);