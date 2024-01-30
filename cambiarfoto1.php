<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="shortcut icon" href="letraCfondonegro.png">
	<link rel="stylesheet" type="text/css" href="style2.css" />
	<title>Cambiar foto</title>
</head>

<body>
	<?php
	include("conexion.php");
	if (isset($_POST["cambiar_foto"])) {
		$id = $_GET['id'];
		$titulo = $_GET['titulo'];
		$rutafoto = $_GET['ruta'];
		$descripcionfoto = $_GET['descripcionfoto'];
		$preciofoto = $_GET['preciofoto'];
	}
	?>
	<h1>cambiar foto</h1>
	<!--Si cambia datos e imagen, solo falta borrar antigua imagen de uploads-->
	<!--/ / / Formulario foto  / / / / / / / / / / / / / / / / / /-->
	<form action="upload1.php" method="post" enctype="multipart/form-data">
		<input type="text" name="email" value="<?php echo $email; ?>" style="display: none;">
		<table>
			<tr>
				<td><input type='hidden' name='id_foto' id='id_foto' value='<?php echo $id; ?>'></td>
			</tr>
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
				<td>Descripción:</td>
				<td>
					<input type="text" name="campo_descripcion" id='campo_descripcion' value='<?php echo $descripcionfoto; ?>' rows="4" cols="25"></input>
				</td>

			<tr>
				<td>Precio:</td>
				<td>
					<input type='number_format' name='campo_precio' id='campo_precio' value='<?php echo $preciofoto; ?>'>
					<input type='submit' name='submit' id="btn_enviar" value='Subir'>
				</td>
			</tr>

			<!--			Estado de producto:
			<select name="sector" id="sector">
				<option disabled selected=""><?php echo $sector; ?></option>
				<option value="0">Nuevo</option>
				<option value="1">Semi nuevo</option>
				<option value="2">De segunda mano</option>
				<option value="3">Usado</option>
			</select>-->
		</table>
	</form>

	<!--	<form method="post" action="eliminar_foto.php?id=<?php echo $id_foto; ?>&ruta=<?php echo $rutafoto; ?>">
		<table class="uno">
			<tr>
				<td>
					<button type="submit" name="eliminar_foto">Eliminar foto</button>
				</td>
			</tr>
		</table>
	</form>-->

	<!--/ / / / / /  / / / / / / / / / / / / / / / / / / /-->
	<br>
	<hr width="1000" color="black">
	<br>
	<!--/ / / / / /  / / / / / / / / / / / / / / / / / / /-->

</body>

</html>