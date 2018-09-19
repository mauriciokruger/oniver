(function(){
	'use strict';

	angular
		.module('app')
		.config(routes);

	function routes($stateProvider, $urlRouterProvider, $locationProvider) {
		$urlRouterProvider.otherwise('/');

		$stateProvider
			.state('main', {
				templateUrl: 'structure/main.template.html',
				controller: 'MainController',
				controllerAs: 'vm',
			})
			.state('home', {
				url: '/',
				templateUrl: 'layouts/home.template.html',
				controller: 'HomeController',
				controllerAs: 'vm',
				parent: 'main'
			})
			.state('busca', {
				url: '/busca',
				templateUrl: 'layouts/busca.template.html',
				controller: 'BuscaController',
				controllerAs: 'vm',
				parent: 'main'
			})
		$locationProvider.html5Mode(true);
	}

})();
