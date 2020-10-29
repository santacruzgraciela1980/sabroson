<?php
$nombre=$_POST['nombre']; 
$telefono=$_POST['telefono']; 
$mail=$_POST['mail']; 
$pass=$_POST['pass']; 
$confirmar=$_POST['confirmar']; 
$direccion=$_POST['direccion']; 
$barrio=$_POST['barrio'];
if(empty($nombre) || empty($telefono) || empty($mail) || empty($pass) || empty($confirmar)|| empty($direccion)){
   header("Location:../interfaces/registro.php");
    exit;
}
elseif(strlen($nombre)<6 || strlen($telefono)<6 || strlen($mail)<6 || strlen($pass)<6 || strlen($confirmar)<6|| strlen($direccion)<6){
   header("Location:../interfaces/registro.php");
    exit;
}
elseif($pass!=$confirmar){
   header("Location:../interfaces/registro.php");
    exit;
}
$found=0;
$archivo=fopen("../archivos/usuarios.csv",'r');
while(!feof($archivo)){
    $linea=fgets($archivo);
    $datos=explode('|',$linea);
    $nom=$datos[0];
    $correo=$datos[2];
    if($nom==$nombre && $correo==$mail){
        header("Location:../errores/error1.php");
        $found=1;
    }
}
fclose($archivo);
if($found==0){
    $archivo=fopen("../archivos/usuarios.csv",'a+');
    while(!feof($archivo)){
    $linea=fgets($archivo);
    $datos=explode('|',$linea);
    $nom=$datos[0];
    $tel=$datos[1];
    $correo=$datos[2];
    $contra=$datos[3];
    $dir=$datos[4];
    $bar=$datos[5];
    $arreglo=$nombre.'|'.$telefono.'|'.$mail.'|'.$pass.'|'.$direccion.'|'.$barrio."\n";
    fputs($archivo,$arreglo);
    break;
    
}
fclose($archivo);
$archivo=fopen("../archivos/carritos/$mail.csv",'a');
fclose($archivo);
header("Location:../interfaces/login.php");
}




?>