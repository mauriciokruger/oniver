(function(){
	'use strict';

	angular
	.module('app', ['ui.router',
		'ui.utils.masks',
		'angulartics', 
		'angulartics.google.analytics',
		'br.cidades.estados'
	])

	.run(function ($rootScope, $location, $state, $stateParams, $timeout) {
			$rootScope.$on('$stateChangeSuccess', function(event, toState, toParams, fromState, fromParams){ 
				
            })
        })
	

})();
