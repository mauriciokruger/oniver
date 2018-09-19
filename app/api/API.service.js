(function() {
    'use strict';
    
    angular
        .module('app')
        .factory('API', API);
    
    function API($http, config){
        var cache = {};

        var factory = {
            get: _get,
            post: _post,
            put: _put,
            delete: _delete,
            cacheDestroy: _cacheDestroy,
            addCache: _addCache
        }
        
        function _get(url, param) {
            if(!_getCacheItem(url, param)){
                _setCacheItem(url, param, $http.get(config.url + 'service.php?t=' + url + '&p=' + param));
            }
            return _getCacheItem(url, param);
        };

        function _post(url, params) {
            return $http.post(config.url + 'service.php?t='+url, params);
        };
        function _put(url, params) {
            return $http.put(config.url + 'service.php?t='+url, params);
        };
        function _delete(url, params) {
            return $http.delete(config.url + 'service.php?t='+url, params);
        };

        function _cacheDestroy(){
            cache = {};
        }

        function _addCache(key, value){
            cache[key] = value;
        }

        /* Privates */

        function _getCacheItem(url, param){
            return cache[_urlToKey(url, param)];
        }

        function _setCacheItem(url, param, item){
            cache[_urlToKey(url, param)] = item;
        }

        function _urlToKey(url, param){
            var key = '?t=' + url;
            if(param){
                key += '&p=' + param;
            }
            return key;
        }

        return factory;
    }

})();