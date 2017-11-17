<?php
session_start();
if ($_SERVER['SERVER_NAME'] == 'localhost') {+
	// $servidor = '93.188.160.43';
	// $usuariobd = 'u193463932_c2';
	// $clavebd = 'foreverfree';
	// $bd = 'u193463932_c2';

	$servidor = 'localhost';
	$usuariobd = 'root';
	$clavebd = '';
	$bd = 'tianguismexico';
} else {
	$servidor = '192.168.1.23';
	$usuariobd = 'user';
	$clavebd = 'pass';
	$bd = 'db_name';
}

?>