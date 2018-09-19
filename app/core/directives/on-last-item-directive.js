(function(){
	'use strict';

	angular
		.module('app')
		.directive("onLastItem", onLastItem);

	function onLastItem($timeout){
        let directive =  {
            restrict: "A",
            link: function (scope, element, attrs) {
                if (scope.$last) {
                    $timeout(function(){
                        scope.$eval(attrs.onLastItem);
                    },10);
                }
            }
        };
        return directive;
    };
})();