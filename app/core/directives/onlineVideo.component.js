(function () {
    'use strict';
    angular
        .module('app')
        .component('onlineVideo', {
            bindings: {
                type: '=',
                urlId: '='
            },
            controller: onlineVideoController,
            controllerAs: 'vm',
            template: '<ng-bind-html ng-bind-html="vm.iframe"></ng-bind-html>'
        });
    onlineVideoController.$inject = ['$sce','$scope'];
    
    /* @ngInject */
    function onlineVideoController($sce, $scope) {
        var vm = this;
        var erro = "<h1>Falha ao carregar o vídeo</h1>";
        vm.iframe;
        function loadEmbed() {
            var type = vm.type == null ? 'vimeo' : vm.type;
            var video = getIframe(type, vm.urlId);
            vm.iframe = video == null ? erro : $sce.trustAsHtml(video);
        }
        $scope.$watch('vm.urlId', function(){
            loadEmbed();
        });
        vm.$onInit = function(){
           loadEmbed();
        };
        function getIframe(type, id) {
            var iframe;
            switch (type) {
                case 'vimeo':
                    iframe = "<iframe src='https://player.vimeo.com/video/" + id + "' width='640' height='360' frameborder='0' webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>";
                    break;
                case 'youtube':
                    iframe = "<iframe width='560' height='315' src='https://www.youtube.com/embed/" + id + "' frameborder='0' allowfullscreen></iframe>";
                    break;
                case 'facebook':
                    iframe = '<iframe src="https://www.facebook.com/plugins/video.php?href=https%3A%2F%2Fwww.facebook.com%2Ffacebook%2Fvideos%2F' + id + '%2F&width=500&show_text=false&height=280&appId" width="500" height="280" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true"></iframe>';
                    break;
            }
            return iframe;
        }
    }
})();
