var gkcommerceController = angular.module('gkcommerceControllers', [])
gkcommerceController.controller('OAuthLoginCtrl', ['$scope', '$http',
function($scope, $http) {
    $scope.login = function() {
        $scope.$broadcast('show-errors-check-validity')
        if ($scope.loginForm.$valid) {
            console.log($scope.user)
            $http.
                post("/api/oauth/login", $scope.user).
                success(function(data, status, headers, config) {
                    console.log(data)
                })
        }
    }
}])
