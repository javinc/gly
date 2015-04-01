
<?php
    include_once('config.php');

    if(isset($_SERVER['REQUEST_URI']) && trim($_SERVER['REQUEST_URI'], '/') != '') {
        $new = $_SERVER['REQUEST_URI'];

        function httpGet($url) {
            $ch = curl_init();  
         
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
            curl_close($ch);

            return $output;
        }
         
        $res = json_decode(httpGet(API_CLICK . $new), true);
        $loc = '/';
        if(!isset($res['error'])) {
            $loc = $res['url'];
        }

        header('Location: ' . $loc);
    }
?>
<!doctype html>
<html ng-app="glyus" prefix="og: http://ogp.me/ns#">
    <head>
        <title>Gly a memorable URL shortener</title>
    	<link rel="shortcut icon" type="image/png" href="/favicon.png"/>
    
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="chiligarlic, gly, shortlink, simplifier, linker, rememberable, easy">
        <meta name="description" content="Gly an easy to remember URL simplifier">
        <meta name="author" content="chiligarlic">

        <meta property="og:url" content="http://gly.us" />
        <meta property="og:title" content="Gly a memorable URL shortener" />
        <meta property="og:description" content="Its just another URL shortener that easy to remember with a little bit of fun. Enjoy Glying!" />
        <meta property="og:site_name" content="Gly"/>
        <meta property="og:image" content="http://gly.us/banner.png" />
        <meta property="og:type" content="website" />
        <meta property="fb:app_id" content="470941366421345" />

        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- App Style -->
        <link rel="stylesheet" href="app.css">
    </head>
    <body>
        <div ng-controller="ShorterController" align="center" id="container">
    	    <h1>
                <img src="header.png">
            </h1>
            <form ng-submit="create()">
                <input id="gly_text" class="glyus" type="text" ng-model="url" placeholder=" Simplify your URL" autofocus required>
            </form>
            <br />
            <p id="clicks_text">clicks <span class="badge">{{clicks}}</span></p>
            <br /><br /><br />	
            <div class="fb-like" data-share="true" data-action="like" data-action="like" data-layout="button_count" data-show-faces="true"></div>
        </div>
        <a href="mailto:dev@chiligarlic.com">
            <span id="total_text">0</span>
            <img src="http://chiligarlic.com/img/favicon.png" alt="ChiliGarlic">
        </a>

        <!-- Latest compiled and minified JQuery -->
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified Angular -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
        <!-- App Script -->
        <script src="config.js"></script>
        <script src="app.js"></script>
    </body>
</html>
