(function(){
  'use strict';

  angular
    .module('app')
    .directive('onPageIsScrolled', onPageIsScrolled);

  function onPageIsScrolled($document, $timeout){
    return {
      link: onPageIsScrolled,
      scope: {
        onPageIsScrolled: '&',
        onPageIsNotScrolled: '&'
      }
    }

    function onPageIsScrolled(scope, element, attrs){
      let whenScroll = scope.onPageIsScrolled;
      let whenInTop = scope.onPageIsNotScrolled || false;
      let scrolled = false;

      $timeout(function(){onPageScrolled()});
      $document[0].addEventListener('scroll', function(){onPageScrolled()})

      function onPageScrolled(){
        if(pageYOffset && !scrolled){
          scope.$apply(whenScroll);
          scrolled = true;
        } else if(!pageYOffset) {
          if(whenInTop){
            scope.$apply(whenInTop);
          }
          scrolled = false;
        }
      }
    }

  }

})();
