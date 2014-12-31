var gkcommerceController = angular.module('gkcommerceControllers', [])
gkcommerceController.controller('OAuthLoginCtrl', ['$scope', '$http',
function($scope, $http) {
    $scope.login = function() {
        $scope.$broadcast('show-errors-check-validity')
        if ($scope.loginForm.$valid) {
            $http.
                post("/oauth/login", $scope.user).
                success(function(data, status, headers, config) {
                    if (200 == status)
                        location.href = "/oauth/authorize" + location.search;
                })
        }
    }
}])
