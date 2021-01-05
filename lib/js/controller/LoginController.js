app.controller('LoginController', ['$scope','$location', 'LoginService', function($scope, $location, LoginService){

  $scope.data  = [];
  $scope.error = '';

  $scope.login = function(){

    let data = {email:$scope.data.email, password: $scope.data.password};
    $scope.error = '';
    
    LoginService.login(data)
    .then(
      function success(response) {
        if(response.data.status == 1){
          localStorage.setItem('player', JSON.stringify(response.data.response));
          $location.path("/dashboard");
        }

        if(response.data.status == 0){
          $scope.error = response.data.message;
        }
      },
      function error (response) {
        $scope.error = "Houve um error no servidor. Tente novamente mais tarde!";
      }
    );

  }

}]);