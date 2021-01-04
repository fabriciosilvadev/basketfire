app.controller('LogoutController', ['$scope','$location', 'LoginService', function($scope, $location, LoginService){
    localStorage.removeItem('player');
    $location.path("/login");
}]);