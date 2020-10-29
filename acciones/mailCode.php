<?php
function activacion () {
	$caracteres = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$caracteres .= 'abcdefghijklmnopqrstuvwxyz';
	$caracteres .= '01234567890123456789';	
	$codigo = "";
	$limite = strlen($caracteres);
	for ($i=0; $i < 20; $i++){
		$codigo .= $caracteres[rand(0, $limite)];//el .= va a ir concatenando los caracteres
	}		
	return $codigo;
}
// nota grabar la creacion del usuario con la fecha mostrar en su perfil, usuario desde...
function envioConfirmacion ($email,$nombre) {
	$codigo = activacion ();

	$cabeceras  = 'MIME-Version: 1.0'."\r\n";
	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1'."\r\n";

	$mensaje = '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8"/>	
	<style type="text/css">		
		input {
			width: 350px;
			height: 40px;
			padding: 5px;			
			border: 1px solid;
			border-color: #D8D8D8;
			border-radius: 5px;				
			color: #000000;		
			font-size: 22px;
			text-align: center;					
			background-color: #FAFAFA;
			outline: none;
		}
	</style>
</head>
<body>
	<h2>'.$nombre.'</h2>
	<h3>Bienvenido a DOCS</h3>			
	<h3>Usa este codigo para activar tu cuenta</h3>
	<input type="text" value="'.$codigo.'" readonly />
	<p>Guarda este codigo en algun lugar seguro</p>
	<p>Si no fuiste tu quien se registro en el sitio elimina este mail</p>	
</body>
</html>';	

mail($email, "Activar usuario DOCS", $mensaje, $cabeceras);
return $codigo;
}
?>