app.controller('PointEditController', ['$scope','$location', 'PointService', 'LoginService', '$stateParams', function($scope, $location, PointService, LoginService, $stateParams){
  LoginService.auth();

  $scope.user    = LoginService.getInfo();
  $scope.data    = [];
  $scope.error   = '';
  $scope.success = '';

  populate();

  $scope.update = function(){
      $scope.validate();

      $scope.error   = '';
      $scope.success = '';

      var user = LoginService.getInfo();
      var data = {id: $stateParams.id, date: $scope.data.date, point: $scope.data.point, token: user.token};
      
      PointService.update(data)
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
    if($scope.data.date == ''){  $scope.error = $scope.error + "Data do Jogo obrigatório."; }
    if($scope.data.point == ''){ $scope.error = $scope.error + "Pontos do Jogo obrigatório."; }
    return false;
  }

  function populate(){
    var user = LoginService.getInfo();
    var data = {id: $stateParams.id, token: user.token};
    PointService.find(data)
    .then(
      function success(response) {
        console.log(response);
        if(response.data.status == 1){

          var result = new Date(response.data.response.date);
          result.setDate(result.getDate() + 1);
          date = result;

          $scope.data.date  = date;
          $scope.data.point = response.data.response.point;
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