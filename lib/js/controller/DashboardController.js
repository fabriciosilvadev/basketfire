app.controller('DashboardController', ['$scope','$location', 'LoginService', 'PointService', function($scope, $location, LoginService, PointService){

  LoginService.auth();

  $scope.user    = LoginService.getInfo();
  $scope.points  = [];
  $scope.report  = [];
  $scope.records = [];
  $scope.records_point = 0; 
  $scope.error   = '';

  populate();

  $scope.addPoint = function(){
    LoginService.logout();
    $location.path("/login");
  }

  $scope.logout = function(){
    LoginService.logout();
    $location.path("/login");
  }

  $scope.formatDate = function(date){
    if(date != ''){
      var explode = date.split('-');
      return explode[2] +'/'+ explode[1] +'/'+ explode[0];
    }
    return 'N/D';
  }

  $scope.roundMedia = function(media){
    if(media != ''){
      return Math.ceil(media);
    }
    return 0;
  }

  $scope.getRecordPoints = function(games){

    if(games.length > 0){
      let records       = 0
      let lastRecord    = 0
      let response      = [];

      games.forEach((game, index) => {
        if (index === 0) {
          lastRecord = game.point
          return;
        }
        if (game.point > lastRecord) {
          records    += 1
          lastRecord  = game.point
          game.record = true;
          response.push(game);
        }
      })
      $scope.records       = response;
      $scope.records_point = response.length;
    }
  }

  $scope.getFormatPoints = function(games){
    if(games.length > 0){
      let response = [];
      
      for(let i=0;i<games.length;i++){
        let compare = $scope.comparePoints(games[i].id);

        if(compare){
          games[i].record = true;
          response.push(games[i]);
        }
        else{
          games[i].record = false;
          response.push(games[i]);
        }
      }
      $scope.points = response;
    }
  }

  $scope.comparePoints = function(game){
    if(game != ''){
      let response = false;
      for(let r=0;r< $scope.records.length;r++){
        if($scope.records[r].id == game){
          response = true;
        }
      }
      return response;
    }
  }

  $scope.deletePoint = function(point){
    console.log(point);
    var data = {id: point, token: $scope.user.token};

    PointService.delete(data)
      .then(
        function success(response) {
          if(response.data.status == 1){
            alert("Registro excluído com sucesso.");
            populate();
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

  function populate(){
    PointService.list({token:$scope.user.token})
      .then(
        function success(response) {
          if(response.data.status == 1){
            $scope.getRecordPoints(response.data.response.points);
            $scope.getFormatPoints(response.data.response.points);
            $scope.points = response.data.response.points;
            $scope.report = response.data.response.report;
          }
    
          if(response.data.status == 0){
            $scope.error = response.data.message;
          }
        },
        function error (response) {
          console.log(response);
          $scope.error = "Houve um error no servidor. Tente novamente mais tarde!";
        }
    );
  }
  
}]);