<?php
switch ($_SERVER['SERVER_NAME']) {
	case 'localhost':
	    define('base_url', '/oniver/app/');
    break;
    default:
	    define('base_url', '/oniver/');
    break;
}
?>
