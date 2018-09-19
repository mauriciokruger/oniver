(function(){
	'use strict';

	angular
		.module('app')
		.filter('html', htmlFilter);

		function htmlFilter($sce) {
            return function (input, type) {
                return $sce.trustAsHtml(input);
            };
        }

})();