<?php
    $producto=$_POST['producto'];
    $carrito=$_POST['carrito'];
    $precio=$_POST['precio'];
    $archivo=fopen("../archivos/carritos/$carrito.csv","a+");
    $arreglo=$producto.'|'.$precio."\n";
    fputs($archivo,$arreglo);
    fclose($archivo);
    header("Location:../interfaces/carrito.php");
?>