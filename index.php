<?php

$errores = '';
$enviado = '';

if (isset($_POST['submit'])) {
	$nombre = $_POST['nombre'];
	$correo = $_POST['correo'];
	$mensaje = $_POST['mensaje'];
	$asunto = $_POST['asunto'];

	if (!empty($nombre)) {
		$nombre = trim($nombre);
		$nombre = filter_var($nombre,FILTER_SANITIZE_STRING);
	} else {
		$errores .= 'Por favor ingresa un nombre.<br>';
	}

	if (!empty($correo)) {
		$correo = filter_var($correo,FILTER_SANITIZE_EMAIL);
		if(!filter_var($correo,FILTER_VALIDATE_EMAIL)){
			$errores .= 'Por favor ingresa un correo valido.<br>';
		}
	} else {
		$errores .= 'Por favor ingresa un correo.<br>';
	}

	if (!empty($mensaje)) {
		$mensaje = htmlspecialchars($mensaje);
		$mensaje = trim($mensaje);
		$mensaje = stripslashes($mensaje);
	} else {
		$errores .= 'Por favor ingresa un mensaje.<br>';
	}

	if (!empty($asunto)) {
		$asunto = htmlspecialchars($asunto);
		$asunto = trim($asunto);
		$asunto = stripslashes($asunto);
	} else {
		$errores .= 'Por favor ingresa un asunto.<br>';
	}

	if (!$errores) {
		$enviar_a = 'tucorreo@tuempresa.com';
		$asunto_preparado = $asunto;
		$mensaje_preparado = 'De: ' . $nombre . '\n';
		$mensaje_preparado .= 'Correo: ' . $correo . '\n';
		$mensaje_preparado .= 'Mensaje: ' . $mensaje;

		mail($enviar_a,$asunto_preparado,$mensaje_preparado);
		$enviado = 'true';
	}
}

require 'views/index.view.php';

?>