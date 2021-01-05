const app = angular.module('basketFire',['ui.router']);

app.config(['$qProvider', function ($qProvider) {
  $qProvider.errorOnUnhandledRejections(false);
}]);

const endpoint = 'http://localhost:8888/backend/';