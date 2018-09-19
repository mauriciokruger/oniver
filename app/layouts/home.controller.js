(function(){
  'use strict';

  angular
  .module('app')
  .controller('HomeController', HomeController)
  .filter('trustAs', function ($sce) {
    return function (input, type) {
        if (typeof input === "string") {
            return $sce.trustAs(type || 'html', input);
        }
        return "";
    };
});
  function HomeController(API,$sce, $timeout, $state, $scope, $location){
    let vm = this;
    vm.$onInit = () => {
        getFromAPI();
    }
    function getFromAPI() {
        //API.get('imovel/destaques').then(result => {
        //    vm.depoimentos = result.data;
        //});
    }
    
    vm.busca = function (valores) {
        $.cookie("busca", valores.busca);
        $location.path("/busca");
        $('input').val('');
        console.log(valores);
    };

    

  }//fim controller


})();
