var app = angular.module('basketFire',['ui.router']);
var endpoint = 'http://localhost:8888/backend/';

app.config(['$qProvider', function ($qProvider) {
  $qProvider.errorOnUnhandledRejections(false);
}]);

