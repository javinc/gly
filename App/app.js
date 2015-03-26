angular.module('glyus', [])
.controller('ShorterController', ['$http', '$scope', function($http, $scope) {
    $scope.create = function() {
        if($scope.url != undefined && $scope.url != '') {
            debug('creating...')

            $http.get(api + '/create?url=' + $scope.url).
	        success(function(data) {
	            debug('success!')
	            debug(data)

	            $scope.new = host + '/' + data.new;
	            $scope.clicks = data.clicks + ' clicks';
	        }).
	        error(function(data) {
	            debug('error!')
	            debug(data)

	            $scope.new = 'something went wrong';
	        })
        }
    };
}]);

var host = 'glyus.dev';
var api = 'http://api.glyus.dev';
var debug = function(x) {
	// console.log(x)
}