(function(){
  'use strict';

  angular
  .module('app')
  .controller('BuscaController', BuscaController)
  .filter('trustAs', function ($sce) {
    return function (input, type) {
        if (typeof input === "string") {
            return $sce.trustAs(type || 'html', input);
        }
        return "";
    };
});
  function BuscaController(API,$sce, $timeout, $state, $scope, $location){
    let vm = this;
    vm.$onInit = () => {
        getFromAPI();
    }
    function getFromAPI() {
        //API.get('imovel/destaques').then(result => {
        //    vm.depoimentos = result.data;
        //});
    }
    
  

    

  }//fim controller


})();
