<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db = "mercosur";
    $MySQLiconn = new MySQLi($servername,$username,$password,$db);
    
    if($MySQLiconn->connect_errno){
        die("ERROR : ->".$MySQLiconn->connect_error);
    }
?>