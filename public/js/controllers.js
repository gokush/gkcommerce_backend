var gkcommerceController = angular.module('gkcommerceControllers', [])
gkcommerceController.controller('OAuthLoginCtrl', ['$scope',
function($scope) {
    $scope.login = function() {
        $scope.$broadcast('show-errors-check-validity')
        if ($scope.loginForm.$valid) {

        }
    }
}])
