(function(){
	'use strict';

	angular
		.module('app')
		.filter('phone', function () {
        return function (tel) {
            if (!tel) {
                return '';
            }
            var value = tel.toString().trim().replace(/^\+/, '');
            if (value.match(/[^0-9]/)) {
                return tel;
            }

           var country, city, number;
            switch (value.length) {
                case 10: // +1PPP####### -> C (PPP) ###-####
                    country = '+55';
                    city = value.slice(0, 2);
                    number = value.slice(1);
                    break;
                case 11: // +CPPP####### -> CCC (PP) ###-####
                    country = '+55';
                    city = value.slice(0, 2);
                    number = value.slice(2);
                    break;
                default:
                    return tel;
            }
            switch (value.length) {
                case 10:
                    number = number.slice(1, 5) + '-' + number.slice(5);
                    return (" (" + city + ") " + number).trim();
                    break;
                case 11:
                    number = number.slice(0, 5) + '-' + number.slice(5);
                    return (" (" + city + ") " + number).trim();
                    break;
            }
        }
    })

})();