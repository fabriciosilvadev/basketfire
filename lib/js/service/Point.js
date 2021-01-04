app.service('PointService', [ '$http','$location', function($http, $location) {

  this.create = function (data) {
    var url = 'point/create/'; 
    return $http.post(endpoint+url, data);
  }

  this.list = function (data) {
    var url = 'point/list/'; 
    return $http.post(endpoint+url, data);
  }

} ]);