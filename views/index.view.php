<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Formulario de contacto</title>
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="css/style.css">
</head>
<body>
	<div class="wrap">
		<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
			<h1>Contacto</h1>
			<input type="text" class="form-control" name="nombre" placeholder="Nombre:" value="<?php if(!$enviado && isset($nombre)) echo $nombre; ?>" id="nombre">
			<input type="text" class="form-control" name="correo" placeholder="Correo:" value="<?php if(!$enviado && isset($correo)) echo $correo; ?>" id="correo">
			<input type="text" class="form-control" name="asunto" placeholder="Asunto:" value="<?php if(!$enviado && isset($asunto)) echo $asunto; ?>" id="asunto">
			<textarea name="mensaje" class="form-control" id="mensaje" placeholder="Mensaje:"><?php if(!$enviado && isset($mensaje)) echo $mensaje; ?></textarea>

			<?php if (!empty($errores)): ?>
				<div class="alert error">
					<?php echo $errores; ?>
				</div>
			<?php elseif($enviado): ?>
				<div class="alert success">
					<p>Se envio con exito.</p>
				</div>
			<?php endif ?>

			<input type="submit" name="submit" class="btn btn-primary" value="Enviar correo">
		</form>
	</div>
</body>
</html>