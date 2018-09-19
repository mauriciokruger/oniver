(function(){
	'use strict';
	angular
		.module('app')
		.controller('MainController', MainController);
		function MainController($timeout, $scope, $rootScope, API, config, $location, $analytics, $state){
			let vm = this;
            vm.loading = function () {
                $(".loading").show();
                $(".loading").delay(2000).fadeOut("slow");
            };
            vm.loading();
            $rootScope.$on('$stateChangeSuccess', function (event, toState, toParams, fromState, fromParams) {
                vm.ScrollPath();
                $analytics.pageTrack($location.url());
                vm.loading();
            });
            vm.ScrollPath = function () {
                $timeout(function () {
                    if ($location.path() != '/') {
                        $('html , body').animate({
                         scrollTop: $('.topo_internas').last().offset().top 
                         });
                    } else {
                        $("html, body").animate({
                            scrollTop: 0
                        }, 300);
                    }
                });
            }
            $rootScope.baseUrl = config.baseUrl;
            $rootScope.urlUpload = config.urlUpload;
            $rootScope.hashUpload = config.hashUpload;
            vm.$onInit = () => {
                getFromAPI();
            }
            function getFromAPI() {
                //API.get('post/46/destino').then(result => {
                //    vm.patrocinadores = result.data;
                //});
            }
            
            
        }
})();