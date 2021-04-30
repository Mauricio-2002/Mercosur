<?php
include_once 'db.php';

/*codigo para el insert*/
if(isset($_POST['save']))
{
    $nombre = $MySQLiconn->real_escape_string($_POST['nombre']);
    $tipo = $MySQLiconn->real_escape_string($_POST['tipo']);
    $precio = $MySQLiconn->real_escape_string($_POST['precio']);
    $descripcion = $MySQLiconn->real_escape_string($_POST['descripcion']);
    $idpais = $MySQLiconn->real_escape_string($_POST['idpais']);

    $SQL = $MySQLiconn->query("INSERT INTO productos(nombre,tipo,precio,descripcion,idpais)VALUES('$nombre','$tipo','$precio','$descripcion','$idpais')");



    if(!$SQL)
    {
        echo $MySQLiconn->error;
    }
}
/*codigo para el insert*/


/*codigo para el delete*/
if(isset($_GET['del']))
{
    $SQL = $MySQLiconn->query("DELETE FROM productos WHERE id=".$_GET['del']);
    header("Location: index.php");
}
/*codigo para el delete*/



/*codigo para el update*/
if(isset($_GET['edit']))
{
    $SQL = $MySQLiconn->query("SELECT * FROM productos WHERE id=".$_GET['edit']);
    $getROW = $SQL->fetch_array();

}

if(isset($_POST['update']))
{
    $SQL = $MySQLiconn->query("UPDATE productos SET nombre='".$_POST['nombre']."', tipo='".$_POST['tipo']."', precio='".$_POST['precio']."', descripcion='".$_POST['descripcion']."', idpais='".$_POST['idpais']."' WHERE id=".$_GET['edit']);
    header("Location: index.php");
}
/*codigo para el update*/

?>