<?php
    const API_CLICK = 'http://api.glyus.dev/click';

    if(isset($_SERVER['REQUEST_URI'])) {
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
<html ng-app="glyus">
    <head>
        <title>Glyus</title>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="keywords" content="chiligarlic, glyus, shortlink, shortener, linker">
        <meta name="description" content="Yet another link shortener with a litle bit twist">
        <meta name="author" content="glyus">

        <!-- Latest compiled and minified JQuery -->
        <script src="//code.jquery.com/jquery-1.11.2.min.js"></script>
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
        <!-- Latest compiled and minified Angular -->
        <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
        
        <link rel="stylesheet" href="main.css">
        <script src="app.js"></script>
    </head>
    <body>
        <div ng-controller="ShorterController" align="center" id="container">
            <form ng-submit="create()">
                <input class="glyus" type="text" ng-model="url" autofocus required placeholder="Paste URL here">
                <input class="glyus" type="submit" value="G l y">
            </form>
            <p class="new">{{new}}</p>
            <p>{{clicks}}</p>
        </div>
    </body>
</html>