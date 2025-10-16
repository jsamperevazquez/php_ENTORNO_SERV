<!DOCTYPE html>
<html lang="es">
<?php
$librerias = ["logo.php", "menu.php", "pictures.php", "content.php", "sidebar.php", "footer.php"];
foreach ($librerias as $lib) {
	include_once $lib;
}
?>

<head>
	<meta charset="utf-8">
	<title>Web Portal - Includes and requires</title>
	<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
</head>

<body>

	<div id="header" class="container">
		<?php
		cargar_logo();
		cargar_menu();
		?>
	</div>
	<?php
	cargar_fotos();
	?>
	<div id="page">
		<div id="bg1">
			<div id="bg2">
				<div id="bg3">
					<?php
					cargar_contenedor();
					cargar_side();
					?>
				</div>
			</div>
		</div>
	</div>

	<?php
	cargar_footer();
	?>
</body>

</html>