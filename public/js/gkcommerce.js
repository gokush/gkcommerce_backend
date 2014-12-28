var commerceApp = angular.module('commerceApp', [
    'ngRoute', 'gkcommerceControllers'
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
