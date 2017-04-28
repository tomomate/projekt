var app = angular.module('shop', [
  'ngCookies',
  'ngResource',
  'ngSanitize',
  'restangular',
  'ui.router'
]);

app.config(function (RestangularProvider) {
  RestangularProvider.setBaseUrl('/');
});


app.config(['$stateProvider', '$urlRouterProvider',
  function ($stateProvider, $urlRouterProvider) {

    $urlRouterProvider.otherwise('/');

    $stateProvider
      .state('home', {
        url: '/',
        templateUrl: 'views/main.html',
        controller: 'MainCtrl'
 }).state('ajax1',{
	 url:'/ajax1',
	 templateUrl: 'views/ajax1.html',
	 controller: 'ajax1Ctrl'
 }).state('ajax2',{
	 url:'/ajax2',
	 templateUrl: 'views/ajax2.html',
	 controller: 'ajax2Ctrl'
 });


  }
]);