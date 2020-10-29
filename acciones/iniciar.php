<?php
//Faltan agregar cosas!!
    $usr=$_POST['correo'];
    $pwd=$_POST['pass'];
    if($usr==1234 && $pwd==1234){
        session_start();
        $_SESSION['admin']['nombre']="Administrador";
        header("Location:../interfaces/admin.php");
        exit;
    }
    $archivo=fopen("../archivos/usuarios.csv",'r');
    while(!feof($archivo)){
        $linea=fgets($archivo);
        $datos=explode('|',$linea);
        $nom=$datos[0];
        $user=$datos[2];
        $password=$datos[3];
        $dir=$datos[4];
        $loc=$datos[5];
        if($user==$usr && $password==$pwd){
            session_start();
            $_SESSION['user']=array();
            $_SESSION['user']['nombre']=$nom;
            $_SESSION['user']['mail']=$user;
            $_SESSION['user']['direccion']=$dir;
            $_SESSION['user']['localidad']=$loc;
            echo $_SESSION['user']['nombre'];
            header("Location:../Index.php");
            exit;
        }
        header("Location:../errores/error2.php");
    }

?>