(function(){
    angular
        .module('app')
        .factory('disqus', disqus)
    
        function disqus(){
            var service = {
                create: create
            }
            return service;
            
            function create(){
                (function() { // DON'T EDIT BELOW THIS LINE
                var d = document, s = d.createElement('script');
                s.src = '//blogo2.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
                })();
            }
        }
})();