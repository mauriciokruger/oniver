<?php
include 'config.php';

switch ($_SERVER['REQUEST_METHOD']) {
	case 'POST':
		$valor = json_decode(file_get_contents("php://input"));
		switch ($_GET['t']) {
			case 'contact':				
				
			break;
			
			default:
			break;
		}
	break;

	case 'GET':
		$rows = array();
		$path = $_GET['t'];
		$param = $_GET['p'];
		switch ($path) {
			default:
			break;
		}
	break;
	default:
	break;
}
?>