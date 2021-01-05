app.service('PointService', [ '$http','$location', function($http, $location) {

  this.create = function (data) {
    var url = 'point/create/'; 
    return $http.post(endpoint+url, data);
  }

  this.update = function (data) {
    var url = 'point/update/'; 
    return $http.post(endpoint+url, data);
  }

  this.delete = function (data) {
    var url = 'point/delete/'; 
    return $http.post(endpoint+url, data);
  }

  this.list = function (data) {
    var url = 'point/list/'; 
    return $http.post(endpoint+url, data);
  }

  this.find = function (data) {
    var url = 'point/find/'; 
    return $http.post(endpoint+url, data);
  }

} ]);