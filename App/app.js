angular.module('glyus', [])
.controller('ShorterController', ['$http', '$scope', function($http, $scope) {
    $scope.create = function() {
        getById('clicks_text').style.opacity = 0;
        if($scope.url != undefined && $scope.url != '') {
            debug('creating...')
            $http.post(api + '/create', {url: $scope.url}).
	        success(function(data) {
	            debug('success!')
	            debug(data)
		    
                if(data == null || data == undefined || data.length == 0) {
                    return;
                }
  
	            $scope.url = 'http://' + host + '/' + data.new;
                $scope.clicks = data.clicks;
                $scope.new = data.new;
		        
                getById('gly_text').select()
	            getById('clicks_text').style.opacity = 1;
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
	console.log(x)
}

var getById = function(selector) {
    return document.getElementById(selector)
}

function urlChecker(s) {    
    var regexp = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
    return regexp.test(s);    
}

window.fbAsyncInit = function() {
    FB.init({
        appId      : '470941366421345',
        xfbml      : true,
        version    : 'v2.3'
    });
};

// facebook
(function(d, s, id){
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) {return;}
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));

// Google Analytics
(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

ga('create', 'UA-53683442-4', 'auto');
ga('send', 'pageview');