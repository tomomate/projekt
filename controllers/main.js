angular.module('shop').controller('MainCtrl', function ($scope) {
});

angular.module('shop').controller('ajax1Ctrl', function ($scope, $http) {
	$http.get("php/getData.php").then(function (response) {
        $scope.customers = response.data;
});
});

angular.module('shop').controller('ajax2Ctrl', function ($scope, $http) {
	$http.get("php/getData.php").then(function (response) {
        $scope.customers = response.data;		
});

});