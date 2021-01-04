app.service('LoginService', [ '$http','$location', function($http, $location) {

  this.login = function (data) {
    var url = 'auth/login/'; 
    return $http.post(endpoint+url, data);
  }
  this.logout = function (todo) {
    localStorage.removeItem('player');
  }

  this.getInfo = function(){
    var local = localStorage.getItem('player');
    if(local != null){
      if(local != ''){
        var obj = JSON.parse(local);
        return obj;
      }
    }
    return '';
  }

  this.auth = function(){
    var local = localStorage.getItem('player');
    if(local == null){
      alert("Sua sessão expirou!");
      $location.path("/login");
    }
  }

} ]);