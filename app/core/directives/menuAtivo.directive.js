(function(){
  'use strict';

  angular
    .module('app')
    .directive('menuAtivo', menuAtivoDirective);

  function menuAtivoDirective($state,$rootScope) {
    return {
      restrict: 'A',
      scope: {
        menuAtivo: '@',
        menuAtivoClass: '@'
      },
      transclude: false,
      link: menuAtivoLink
    }

    function menuAtivoLink(scope, element, attrs){
      function verificaMenu(){
        var state = '/'+$state.current.url.split('/')[1];
        if($state.get(scope.menuAtivo).url == state){
          element.addClass(scope.menuAtivoClass);
        }else{
          element.removeClass(scope.menuAtivoClass);
        }
      }
      verificaMenu();
      $rootScope.$on('$stateChangeSuccess',verificaMenu);      
    }
  }
})();
