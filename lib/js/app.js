var app = angular.module('basketFire',['ui.router']);

app.config(['$qProvider', function ($qProvider) {
  $qProvider.errorOnUnhandledRejections(false);
}]);

var endpoint = 'http://localhost:8888/backend/';

