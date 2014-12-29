var commerceApp = angular.module('commerceApp', [
    'ngRoute', 'ngResource', 'gkcommerceControllers', 'ui.bootstrap.showErrors'
])

commerceApp.config(['$routeProvider', '$locationProvider',
function($routeProvider, $locationProvider) {
    $routeProvider.
    when('/', {
        templateUrl: '/templates/oauth_login.html',
        controller: 'OAuthLoginCtrl'
    }).
    otherwise({
        redirectTo: '/'
    });
    $locationProvider
        .html5Mode({
            enable: true,
            requireBase: false})
        .hashPrefix('!');
}]);
