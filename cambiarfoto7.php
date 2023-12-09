<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cambiar foto</title>
</head>

<body>
	<?php
	include 'config.php';
	$consulta = mysqli_query($con, "SELECT * FROM fotos");
	$valores = mysqli_fetch_array($consulta);
	$titulo = $valores['titulofoto'];
	$descripcion = $valores['descripcionfoto'];
	$rutafoto = $valores['rutafoto'];
	$precio = $valores['preciofoto'];
	?>
	<h1>cambiar foto</h1>

	<!--/ / / Formulario foto  / / / / / / / / / / / / / / / / / /-->
	<form action="upload7.php" method="post" enctype="multipart/form-data">
		<input type="text" name="email" value="<?php echo $email; ?>" style="display: none;">
		<table>
			<tr>
				<td>Articulo:
					<label for="campo_titulo"></label>
				</td>
				<td><input type='text' name='campo_titulo' id='campo_titulo' value='<?php echo $titulo; ?>'></td>
			</tr>

			<tr>
				<td>Imagen:<label for="ventana_imagen"></label></td>
				<td><img src="<?php echo $rutafoto; ?>" width="200px" name='ventana_imagen' id="ventana_imagen">
					<input type="file" name="image" id="imagen">
				</td>
			</tr>

			<tr>
				<td>Datos :</td>
				<td>
					<input type="text" name="campo_descripcion" id='campo_descripcion' value='<?php echo $descripcion; ?>' rows="4" cols="25"></input>
				</td>


			<tr>
				<td>Descripción:</td>
				<td>
					<textarea name="campo_descripcion" id='campo_descripcion' value='<?php echo $descripcion; ?>' rows="4" cols="25"></textarea>
				</td>

			<tr>
				<td>Precio:</td>
				<td>
					<input type='number_format' name='campo_precio' id='campo_precio' value='<?php echo $precio; ?>'>
					<input type='submit' name='submit' id="btn_enviar" value='Subir'>
				</td>
			</tr>
		</table>
	</form>

	<form method="post" action="eliminar_imagenb1.php?id=<?php echo $id; ?>&ruta=<?php echo $rutafoto; ?>">
		<table class="uno">
			<tr>
				<td>
					<button type="submit" name="eliminar_imagen">Eliminar foto</button>
				</td>
			</tr>
		</table>
	</form>

	<!--/ / / / / /  / / / / / / / / / / / / / / / / / / /-->
	<br>
	<hr width="1000" color="black">
	<br>
	<!--/ / / / / /  / / / / / / / / / / / / / / / / / / /-->

</body>

</html>