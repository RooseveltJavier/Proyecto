
<?php
	session_start();
	unset($_SESSION['perfil']);
	session_unset();
	session_destroy();
?>

<!DOCTYPE html>
<html lan="es">
<head>	
	<title>Sistema de Gestion Academica</title>
	<meta charset="utf-8"/>
	<meta description =" "/>
	<meta name ="viewport" conten="width=device-width,initial-scale=1"/>
	<link rel="stylesheet" type="text/css" media="all" href="<?php base_url()?>estilos/estilos.css"/>
</head>
<body>
	<header>
	
	</header>	
	<nav>
		
		
	</nav>
	<section id="contenedor">

		<aside id="izquierdo">
				<img src="images/logo.png" rel="Logo UTPL">
				<h3>Sistema de Gestión Académica</h3>
				</br>
				</br>
				</br>
		</aside>

		<section id="main">
				<h1>B I E N V E N I D O S</h1>		
			<article>
				
			<h3>Iniciar Sesion</h3>
			<br/>

			<form action="dll/controller.php" method="post" id="formulario_login">
				
				<fieldset>
     			
			       	 <dl>
			         <dd><label for="referer">Usuario: </label></dd>
			         <dt><input id="usuario" name="usuario" type="text" size="25" placeholder="Usuario"/></dt>
			         
			         <dd><label for="referer">Contraseña: </label></dd>
			         <dt><input id="clave" name="clave" type="password" size="25"  placeholder="Contraseña"/></dt>
			         
			         </dl>
       			</fieldset>
       			<br>
				<div><input name="enviar" id="enviar" type="submit" value="Ingresar" /></div>
				<br/>

			</form>					
				
			</article>

		</section>
		
	</section>
	<?php include("dll/includes/footer.html");
	?>
</body>
</html>