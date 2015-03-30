angular.module('glyus', [])
.controller('ShorterController', ['$http', '$scope', function($http, $scope) {
    $scope.create = function() {
        getById('clicks_text').hidden = true;
        if($scope.url != undefined && $scope.url != '') {
            debug('creating...')
            $http.get(api + '/create?url=' + $scope.url).
	        success(function(data) {
	            debug('success!')
	            debug(data)
		    
		    if(data == null) {
			return;
                    }
  
	            $scope.url = host + '/' + data.new;
		    getById('gly_text').select()
    
                    $scope.clicks = data.clicks;
	            $scope.new = data.new;
	            getById('clicks_text').hidden = false;
	        }).
	        error(function(data) {
	            debug('error!')
	            debug(data)

	            $scope.new = 'something went wrong';
	        })
        }
    };

    // update stat
    setInterval(function() {
    	debug('update stat')
    	$http.get(api + '/stats').
        success(function(data) {
            debug('success!')
            debug(data.total)

            getById('total_text').innerHTML = data.total;
        })
    }, 1000)
}]);

var debug = function(x) {
	// console.log(x)
}

var getById = function(selector) {
    return document.getElementById(selector)
}

function urlChecker(s) {    
      var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
      return regexp.test(s);    
}
