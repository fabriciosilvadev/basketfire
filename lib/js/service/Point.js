app.service('PointService', [ '$http','$location', function($http, $location) {

  this.create = function (data) {
    let url = 'point/create/'; 
    return $http.post(endpoint+url, data);
  }

  this.update = function (data) {
    let url = 'point/update/'; 
    return $http.post(endpoint+url, data);
  }

  this.delete = function (data) {
    let url = 'point/delete/'; 
    return $http.post(endpoint+url, data);
  }

  this.list = function (data) {
    let url = 'point/list/'; 
    return $http.post(endpoint+url, data);
  }

  this.find = function (data) {
    let url = 'point/find/'; 
    return $http.post(endpoint+url, data);
  }

} ]);