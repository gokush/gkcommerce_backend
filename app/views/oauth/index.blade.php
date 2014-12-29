<!DOCTYPE html>
<html ng-app="commerceApp">
    <head>
        <title>身份认证</title>
        <link href="/bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link href="/bower_components/bootstrap/dist/css/bootstrap-theme.min.css" rel="stylesheet">
        <link href="/css/main.css" rel="stylesheet">
        <!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    </head>

    <body>
        <div class="container">
            <div ng-view class="view-frame"></div>
        </div>
        <script src="/bower_components/jquery/dist/jquery.js"></script>
        <script src="/bower_components/angular/angular.js"></script>
        <script src="/bower_components/angular-route/angular-route.js"></script>
        <script src="/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <script src="/bower_components/angular-bootstrap-show-errors/src/showErrors.js"></script>
        <script src="/js/gkcommerce.js"></script>
        <script src="/js/controllers.js"></script>
    </body>
</html>
