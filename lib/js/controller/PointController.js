app.controller('PointController', ['$scope','$location', 'PointService', 'LoginService', function($scope, $location, PointService, LoginService){
  LoginService.auth();

  $scope.user = LoginService.getInfo();

  $scope.data    = [];
  $scope.error   = '';
  $scope.success = '';

  $scope.create = function(){
      $scope.validate();

      $scope.error   = '';
      $scope.success = '';

      var user = LoginService.getInfo();
      var data = {date: $scope.data.date, point: $scope.data.point, token: user.token};
      
      PointService.create(data)
      .then(
        function success(response) {
          if(response.data.status == 1){
            alert("Registro gravado com sucesso.");
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

  $scope.validate = function(){
    if($scope.data.date == ''){ $scope.error = $scope.error + "Data do Jogo obrigatório."; }
    if($scope.data.point == ''){ $scope.error = $scope.error + "Pontos do Jogo obrigatório."; }
    return false;
  }

}]);