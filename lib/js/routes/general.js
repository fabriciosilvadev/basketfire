app.config(function($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/login');

    $stateProvider
        .state("login", {
            url: "/login",
            templateUrl: "pages/login.html",
            controller: "LoginController",
        })
        .state("dashboard", {
            url: "/dashboard",
            templateUrl: "pages/dashboard.html",
            controller: "DashboardController",
        })
        .state("point", {
            url: "/point",
            templateUrl: "pages/point.html",
            controller: "PointController",
        })
        .state("logout", {
            url: "/logout",
            controller: "LogoutController",
        });
});